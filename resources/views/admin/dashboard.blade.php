@extends('layouts.admin')

@section('title', 'Thống kê')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $order_count }}</h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.order.index') }}" class="small-box-footer">Chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $product_count }}</h3>

                            <p>Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.sanpham.index') }}" class="small-box-footer">Chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $category_count }}</h3>

                            <p>Nhóm sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin.nhomsanpham.index') }}" class="small-box-footer">Chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $customer_count }}</h3>

                            <p>Tài khoản khách hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">Chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="card">
                <div style="background-color: grey;color:aliceblue" class="card-header">
                    Đơn hàng
                </div>
                <div class="card-body">
                    <form action="" method="GET" class="form-inline" role="form">
                        <div class="form-group">
                            <input type="date" name="date_from" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <input type="date" name="date_to" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <button type="submit" class="btn btn-primary">Chọn</button>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tài khoản đặt hàng</th>
                            <th>Tên người nhận</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->ten }}</td>
                                <td>
                                    @if ($order->trangthai == 3)
                                        <span class="badge badge-success">Hoàn thành</span>
                                    @elseif ($order->trangthai == 2)
                                        <span class="badge badge-primary">Đang giao</span>
                                    @elseif ($order->trangthai == 1)
                                        <span class="badge badge-warning">Chờ xác nhận</span>
                                    @else
                                        <span class="badge badge-danger">Hủy</span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </section>
    <!-- /.content -->
@endsection
