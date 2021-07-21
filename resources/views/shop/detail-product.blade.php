@extends('shop.layouts.main')

@section('content')
    <style>
        .prod-cont .product-stock{
            margin: 0 0 11px;
            color: #7b7b7b;
        }
        .product-stock span{
            border: 1px solid black;
            color: #fff;
            background: #0ba011;
            padding: 5px 5px;
        }
    </style>
    <main>
        <section class="container">


            <ul class="b-crumbs">
                <li>
                    <a href="index.html">
                        Trang Chủ
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.listProducts', ['slug' => $category->slug]) }}">
                        {{ $category->name }}
                    </a>
                </li>
                <li>
                    {{ $product->name }}
                </li>
            </ul>
            <h1 class="main-ttl"><span>{{ $product->name }}</span></h1>
            <!-- Single Product - start -->
            <div class="prod-wrap">

                <!-- Product Images -->
                <div class="prod-slider-wrap">
                    <div class="prod-slider">
                        <ul class="prod-slider-car">
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="{{ asset($product->image) }}">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-fancybox-group="product" class="fancy-img" href="http://placehold.it/500x722">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="prod-thumbs">
                        <ul class="prod-thumbs-car">
                            <li>
                                <a data-slide-index="0" href="#">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="1" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="2" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="3" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="4" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="5" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="6" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                            <li>
                                <a data-slide-index="7" href="#">
                                    <img src="http://placehold.it/500x722" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Product Description/Info -->
                <div class="prod-cont">
                    <div class="prod-cont-txt">
                        {!! $product->summary !!}
                    </div>
                    <p class="prod-actions">
                        <a href="#" class="prod-favorites"><i class="fa fa-heart"></i> Wishlist</a>
                        <a href="#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
                    </p>
                    <div class="prod-skuwrap">
                        <p class="product-stock">
                            Số lượng:
                            @if ($product->stock > 0)
                                <span>Còn hàng</span>
                            @else
                                <span style="color: red">Hết hàng</span>
                            @endif
                        </p>


                    </div>
                    <div class="prod-info">
                        <p class="prod-priced">
                            <b class="item_current_price" style="color: red; padding: 0 15px 0 0">{{ number_format($product->sale, 0,",",".") }} đ*</b>
                            <b> <strike>{{ number_format($product->price, 0,",",".") }} đ</strike></b>
                        </p>
                        <p class="prod-qnt">
                            <input value="1" type="text">
                        </p>
                        <p class="prod-addwrap">
                            <a href="{{ route('shop.addToCart', ['id' => $product->id]) }}" class="prod-add" rel="nofollow" title="Mua Ngay">Mua Ngay</a>
                        </p>
                    </div>
                    <ul class="prod-i-props">
                        <li>
                            <b> Mã SKU</b> {{ $product->sku }}
                        </li>
                    </ul>
                </div>

                <!-- Product Tabs -->
                <div class="prod-tabs-wrap">
                    <ul class="prod-tabs">
                        <li><a data-prodtab-num="1" class="active" href="#" data-prodtab="#prod-tab-1">Mô Tả</a></li>
                        <li><a data-prodtab-num="3" href="#" data-prodtab="#prod-tab-3">Video</a></li>
                        <li><a data-prodtab-num="4" href="#" data-prodtab="#prod-tab-4">Articles (6)</a></li>
                        <li><a data-prodtab-num="5" href="#" data-prodtab="#prod-tab-5">Reviews (3)</a></li>
                    </ul>
                    <div class="prod-tab-cont">

                        <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Description</p>
                        <div class="prod-tab stylization" id="prod-tab-1">
                            {!! $product->description !!}
                        </div>

                        <p data-prodtab-num="3" class="prod-tab-mob" data-prodtab="#prod-tab-3">Video</p>
                        <div class="prod-tab prod-tab-video" id="prod-tab-3">
                            <iframe width="853" height="480" src="https://www.youtube.com/embed/kaOVHSkDoPY?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                        </div>
                        <p data-prodtab-num="4" class="prod-tab-mob" data-prodtab="#prod-tab-4">Articles (6)</p>
                        <div class="prod-tab prod-tab-articles" id="prod-tab-4">
                            <div class="flexslider post-rel-wrap" id="post-rel-car">
                                <ul class="slides">
                                    <li class="posts-i">
                                        <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/354x236)"></span></a>
                                        <time class="posts-i-date" datetime="2017-01-01 08:18"><span>09</span> Feb</time>
                                        <div class="posts-i-info">
                                            <a class="posts-i-ctg" href="blog.html">Articles</a>
                                            <h3 class="posts-i-ttl"><a href="post.html">Adipisci corporis velit</a></h3>
                                        </div>
                                    </li>
                                    <li class="posts-i">
                                        <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/360x203)"></span></a>
                                        <time class="posts-i-date" datetime="2017-01-01 08:18"><span>05</span> Jan</time>
                                        <div class="posts-i-info">
                                            <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                            <h3 class="posts-i-ttl"><a href="post.html">Excepturi ducimus recusandae</a></h3>
                                        </div>
                                    </li>
                                    <li class="posts-i">
                                        <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/360x224)"></span></a>
                                        <time class="posts-i-date" datetime="2017-01-01 08:18"><span>17</span> Apr</time>
                                        <div class="posts-i-info">
                                            <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                            <h3 class="posts-i-ttl"><a href="post.html">Consequuntur minus numquam</a></h3>
                                        </div>
                                    </li>
                                    <li class="posts-i">
                                        <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/314x236)"></span></a>
                                        <time class="posts-i-date" datetime="2017-01-01 08:18"><span>21</span> May</time>
                                        <div class="posts-i-info">
                                            <a class="posts-i-ctg" href="blog.html">Articles</a>
                                            <h3 class="posts-i-ttl"><a href="post.html">Non ex sapiente excepturi</a></h3>
                                        </div>
                                    </li>
                                    <li class="posts-i">
                                        <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/318x236)"></span></a>
                                        <time class="posts-i-date" datetime="2017-01-01 08:18"><span>24</span> Jan</time>
                                        <div class="posts-i-info">
                                            <a class="posts-i-ctg" href="blog.html">Articles</a>
                                            <h3 class="posts-i-ttl"><a href="post.html">Veritatis officiis</a></h3>
                                        </div>
                                    </li>
                                    <li class="posts-i">
                                        <a class="posts-i-img" href="post.html"><span style="background: url(http://placehold.it/354x236)"></span></a>
                                        <time class="posts-i-date" datetime="2017-01-01 08:18"><span>08</span> Sep</time>
                                        <div class="posts-i-info">
                                            <a class="posts-i-ctg" href="blog.html">Reviews</a>
                                            <h3 class="posts-i-ttl"><a href="post.html">Ratione magni laudantium</a></h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p data-prodtab-num="5" class="prod-tab-mob" data-prodtab="#prod-tab-5">Reviews (3)</p>
                        <div class="prod-tab" id="prod-tab-5">
                            <ul class="reviews-list">
                                <li class="reviews-i existimg">
                                    <div class="reviews-i-img">
                                        <img src="http://placehold.it/120x120" alt="Averill Sidony">
                                        <div class="reviews-i-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                                    </div>
                                    <div class="reviews-i-cont">
                                        <p>Numquam aliquam maiores ratione dolores ducimus, laborum hic similique delectus. Neque saepe nobis omnis laudantium itaque tempore voluptate harum error, illum nemo, reiciendis architecto, quam tenetur amet sit quisquam cum.<br>Pariatur cum tempore eius nulla impedit cumque odit quos porro iste a voluptas, optio alias voluptate minima distinctio facere aliquid quasi, vero illum tenetur sed temporibus eveniet obcaecati.</p>
                                        <span class="reviews-i-margin"></span>
                                        <h3 class="reviews-i-ttl">Averill Sidony</h3>
                                        <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                                    </div>
                                    <div class="reviews-i-answer">
                                        <p>Thanks for your feedback!<br>
                                            Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.</p>
                                        <span class="reviews-i-margin"></span>
                                    </div>
                                </li>
                                <li class="reviews-i existimg">
                                    <div class="reviews-i-img">
                                        <img src="http://placehold.it/120x120" alt="Araminta Kristeen">
                                        <div class="reviews-i-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <time datetime="2017-12-21 12:19:46" class="reviews-i-date">14 February 2017</time>
                                    </div>
                                    <div class="reviews-i-cont">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        <span class="reviews-i-margin"></span>
                                        <h3 class="reviews-i-ttl">Araminta Kristeen</h3>
                                        <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                                    </div>
                                    <div class="reviews-i-answer">
                                        Benjy, hi!<br>
                                        Officiis culpa quos, quae optio quia.<br>
                                        Amet sunt dolorem tempora, pariatur earum quidem adipisci error voluptates tempore iure, nobis optio temporibus voluptatum delectus natus accusamus incidunt provident sapiente explicabo vero labore hic quo?
                                        <span class="reviews-i-margin"></span>
                                    </div>
                                </li>
                                <li class="reviews-i">
                                    <div class="reviews-i-cont">
                                        <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                                        <div class="reviews-i-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        <span class="reviews-i-margin"></span>
                                        <h3 class="reviews-i-ttl">Jeni Margie</h3>
                                        <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                                    </div>
                                    <div class="reviews-i-answer">
                                        Hello, Jeni Margie!<br>
                                        Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.
                                        <span class="reviews-i-margin"></span>
                                    </div>
                                </li>
                            </ul>
                            <div class="prod-comment-form">
                                <h3>Add your review</h3>
                                <form method="POST" action="#">
                                    <input type="text" placeholder="Name">
                                    <input type="text" placeholder="E-mail">
                                    <textarea placeholder="Your review"></textarea>
                                    <div class="prod-comment-submit">
                                        <input type="submit" value="Submit">
                                        <div class="prod-rating">
                                            <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Single Product - end -->

            <!-- Related Products - start -->
            <div class="prod-related">
                <h2><span>Sản Phẩm Liên Quan</span></h2>
                <div class="prod-related-car" id="prod-related-car">
                    <ul class="slides">
                        <li class="prod-rel-wrap">
                            @foreach($relatedProducts as $item)
                            <div class="prod-rel">
                                <a href="{{ route('shop.detailProduct',['slug' => $product->slug]) }}" class="prod-rel-img">
                                    <img src="{{ asset( $item->image) }}" alt="Adipisci aperiam commodi">
                                </a>
                                <div class="prod-rel-cont">
                                    <h3><a href="product.html">{{ $item->name }}</a></h3>
                                    <p class="prod-rel-price">
                                        <b>{{ number_format($product->sale,0,",",".") }} đ</b>
                                    </p>
                                    <div class="prod-rel-actions">
                                        <a title="Wishlist" href="#" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                                        <a title="Compare" href="#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                                        <p class="prod-i-addwrap">
                                            <a title="Add to cart" href="#" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Related Products - end -->

        </section>
    </main>
@endsection

