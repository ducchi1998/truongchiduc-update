<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Order;
use App\OrderProduct;
use App\Setting;
use App\Contact;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Cart;

class ShopController extends Controller
{
    public $categories; // danh sách danh mục

    public function __construct()
    {
        // lấy dữ liệu setting và chia sẻ global
        // 1. cấu hình website
        $settings = Setting::first();

        // 2. Lấy dữ liệu - Danh mục, có trạng thái là hiển thị
        $this->categories = Category::where([
            'is_active' => 1,
            'type' => 1, // lấy ra danh mục sản phẩm
        ])->get(); // bao gồm cả menu cha và con

        // Chia sẻ dữ qua tất các layout
        view()->share([
            'settings' => $settings,
            'categories' => $this->categories
        ]);
    }

    // trang chu
    public function index()
    {
        $sliderBanners =  Banner::where(['is_active' => 1,'type' => 1])->get();
        $leftBanners =  Banner::where(['is_active' => 1,'type' => 2])->get();

        $listCategories = $this->categories; // lấy toàn bộ danh mục

        $data = []; // chứa dữ liệu bao gồm danh muc và sản phẩm

        foreach($listCategories as $key => $category) {
            if ($category->parent_id == 0) { // kiểm tra xem có phải danh mục cha
                $data[$key]['category'] = $category; // b1 . lấy danh mục
                //$data[$key]['products'] = []; // b2 . láy toàn bộ sản phẩm của cả nhóm danh mục


                $ids = []; // mảng các id của nhóm danh mục cha
                $ids[] = $category->id;  // $ids : 1

                foreach ($listCategories as $key2 => $child) {
                    if ($child->parent_id == $category->id) {
                        $ids[] = $child->id; // $ids : 1,7

                        foreach ($listCategories as $key3 => $child2) {
                            if ($child2->parent_id == $child->id) {
                                $ids[] = $child2->id; // // $ids : 1,7,60

                            }
                        }
                    }
                }


                //SELECT * FROM `products` WHERE is_active = 1  AND category_id IN(1,7,60)
                $data[$key]['products'] = Product::where(['is_active' => 1])
                    ->whereIn('category_id' , $ids) // category_id IN(1,7,60)
                    ->limit(10)
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }


        return view('shop.index', [
            'banners' => $sliderBanners,
            'data' => $data,
            'leftBanners' => $leftBanners
        ]);
    }

    // trang lien he
    public function contact()
    {
        return view('shop.contact');
    }

    // trang danh sach san pham
    public function listProducts($slug)
    {
        $category = Category::where(['slug' => $slug, 'is_active' => 1])->firstOrFail();

        $ids = []; // chưa cả id cha và con
        $ids[] = $category->id;

        $listCategories = $this->categories; // lấy toàn bộ danh mục
        foreach ($listCategories as $child) {
            if ($child->parent_id == $category->id) {
                $ids[] = $child->id;

                foreach ($listCategories as $child2) {
                    if ($child2->parent_id == $child->id) {
                        $ids[] = $child2->id;
                    }
                }
            }
        }

        $products = Product::where(['is_active' => 1, 'category_id' => $ids])->paginate(9);

        return view('shop.list-products',[
            'category' => $category,
            'products' => $products
        ]);
    }

    // trang chi tiet san pham
    public function detailProduct($slug)
    {
        $product = Product::where(['slug' => $slug, 'is_active' => 1])->firstOrFail();

        $relatedProducts = Product::where([ ['is_active' , '=', 1],
                                            ['category_id', '=' , $product->category_id ],
                                            ['id', '<>' , $product->id]
                                        ])->orderBy('id', 'desc')
                                            ->get();
        $category = Category::find($product->category_id);

        return view('shop.detail-product',[
            'product' => $product,
            'category'=>$category,
            'relatedProducts' => $relatedProducts
        ]);
    }

    // trang danh sach tin tuc
    public function listArticles()
    {
        $articles = Article::where(['is_active' => 1 ])->latest()->simplePaginate(6);

        return view('shop.list-articles',[
            'articles' => $articles
        ]);
    }

    public function detailArticle($slug)
    {
        $article = Article::where(['slug' => $slug, 'is_active' => 1])->firstOrFail();


        return view('shop.detail-article',[
            'article' => $article
        ]);
    }

    // thêm dữ liệu khách hàng liên hệ vào bảng contact
    public function postContact(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        //luu vào csdl
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        // chuyển về trang chủ
        return redirect('/');
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // thông tin sẽ lưu vào giỏ

        // gọi đến thư viện thêm sản phẩm vào giỏ hàng
        Cart::add(
            ['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->sale,'tax' => 0, 'priceTax' => 0, 'options' => ['tax' => 0 , 'priceTax' => 0, 'image' => $product->image]]
        );

        //session(['totalItem' => Cart::count()]);

        // chuyển về trang danh sách sản phảm trong giỏ hàng
        return redirect()->route('shop.cart');
    }

    // Danh sách đặt hàng - giỏ hàng
    public function cart()
    {
        // lấy dữ liệu = tất cả sản phẩm trong giỏ hàng
        // b1. lấy toàn bộ sản phẩm đã lưu trong giỏ
        $listProducts = Cart::content();

        // lấy tổng giá của đơn hàng
        $totalPrice = Cart::subtotal(0,",",".");

        return view('shop.cart.index', [
            'listProducts' => $listProducts,
            'totalPrice' => $totalPrice
        ]);

    }

    // Hủy Đơn Hàng
    public function cancelCart()
    {
        Cart::destroy();

        return redirect('/');
    }

    // Xóa sản phẩm trong giỏ hàng
    public function removeProductToCart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('shop.cart');
    }

    public function updateCart($rowId, $qty)
    {
        // Cập nhật số lượng sản phẩm
        Cart::update($rowId, $qty);

        return redirect()->route('shop.cart');
    }

    // Lưu được thông tin sản phẩm
    public function order()
    {
        $listProducts = Cart::content();
        $totalPrice = Cart::subtotal(0,",",".");
        return view('shop.cart.order',[
            'listProducts' => $listProducts,
            'totalPrice' => $totalPrice
        ]);
    }

    // Xử lý lưu dữ liệu vào database
    public function postOrder(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');

        // lấy tổng giá của đơn hàng
        $totalPrice = Cart::subtotal(0,",",'');
        $order->total = $totalPrice;
        $order->order_status_id = 1; // 1 = mới , 2 = đang xử lý , 3 = Hoàn Thành, 4 = Hủy
        //$order->save();

        if ($order->save()) {
            // Xử lý lưu chi tiết
            $id_order = $order->id;

            // lấy toàn bộ sản phẩm đã lưu trong giỏ
            $listProducts = Cart::content();

            foreach ($listProducts as $product)
            {
                $_detail = new OrderProduct();
                $_detail->order_id = $id_order;
                $_detail->name = $product->name;
                $_detail->image = $product->options->image;
                $_detail->product_id = $product->id;
                $_detail->qty = $product->qty;
                $_detail->price = $product->price;
                $_detail->save();

            }

            // Xóa thông tin giỏ hàng Hiện tại
            Cart::destroy();


            // Chuyen ve trang thong bao dat hang thanh cong
            return redirect()->route('shop.orderSuccess');

        }
    }

    // trang thong bao
    public function orderSuccess()
    {
        return view('shop.cart.orderSuccess');
    }

    // Tìm kiếm
    public function search(Request $request)
    {
        // mục tiêu : lấy từ khóa + tìm trong bảng sản phẩm

        // b1. Lấy từ khóa tìm kiếm
        $keyword = trim($request->input('keyword'));

        $slug = str_slug($keyword); // chuyen doi ve dang slug

        //$sql = "SELECT * FROM products WHERE is_active = 1 AND slug like '%$keyword%'";
        // b2 : lấy sản phẩm gần giống vs từ khóa tìm kiếm
        $products = Product::where([
            ['is_active', '=', 1],
            ['slug', 'LIKE', '%' . $slug . '%']
        ])->paginate(20);

        $totalResult = $products->total(); // số lượng kết quả tìm kiếm

        return view('shop.search', [
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
