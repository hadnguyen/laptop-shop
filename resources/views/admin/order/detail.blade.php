@extends('layouts.admin')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="row my-2">
        @foreach ($orders as $order)
            <div class="col-md-6">
                <div>
                    Tên người nhận: {{ $order->order->ten }}
                </div>
                <div>
                    Địa chỉ: {{ $order->order->diachi }}
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    Điện thoại: {{ $order->order->phone }}
                </div>
                <div>
                    Ngày đặt: {{ $order->order->created_at }}
                </div>
            </div>
            @break
        @endforeach
    </div>

    <table style="border: solid black;margin-top: 22px;" class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                {{-- <th class="text-right">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td scope="row">{{ $order->order_id }}</td>
                    <th>{{ $order->sanpham->ten }}</th>
                    <td>{{ $order->soluong }}</td>
                    <td>{{ number_format($order->gia) }}</td>
                    <td>{{ number_format($order->gia * $order->soluong) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
