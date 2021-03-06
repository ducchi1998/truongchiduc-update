@extends('admin.layouts.main')
@section('content')
    <style>tr td:first-child {max-width: 250px} .price {color: red}</style>
    <section class="content-header">
        <h1>
            <i class="fa fa-fw fa-cart-arrow-down"></i> Quản Lý Đơn Hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"> Trang chủ</a></li>
            <li>Danh Sách Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header" style="padding: 15px 10px 5px 10px">
                        <h3 class="box-title" style="padding-top: 5px"><a href="{{ route('admin.order.index') }}" title="">Danh Sách Đơn Hàng</a></h3>

                        <div class="box-tools" style="top: 12px">
                            <form action="" method="get" accept-charset="utf-8">
                                <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
                                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ request('search') }}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th class="text-center">TT</th>
                                <th class="text-center">Ngày</th>
                                <th class="text-center">Mã ĐH</th>
                                <th class="text-center" style="max-with:200px">Trạng thái</th>
                                <th>Họ tên khách hàng</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Tổng tiền</th>
                                <th class="text-center"></th>
                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class=""> <!-- Thêm Class Cho Dòng -->
                                    <td class="text-center">{{ $key }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->code }}</td>
                                    <td class="text-center">
                                        @if ($item->order_status_id === 1)
                                            <span class="label label-info">Mới</span>
                                        @elseif ($item->order_status_id === 2)
                                            <span class="label label-warning">Đang XL</span>
                                        @elseif ($item->order_status_id === 3)
                                            <span class="label label-success">Hoàn thành</span>
                                        @else
                                            <span class="label label-danger">Hủy</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->fullname }}
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="price">{{ number_format($item->total) }} đ</td>
                                    <td>
                                        <a href="{{route('admin.order.edit', ['id'=> $item->id ])}}">
                                            <span title="Edit" type="button" class="btn btn-flat btn-primary">Chi tiết</span>
                                        </a>&nbsp;
                                    </td>
                            @endforeach
                            @if($data->count() == 0)
                                <tr>
                                    <td colspan="8" class="text-center text-danger" style="padding: 20px">Không tồn tại bản ghi nào phù hợp với kết quả tìm kiếm của bạn !!!</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $data->appends(request()->all())->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
