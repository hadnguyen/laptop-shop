<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ session()->get('success') }}
        </div>
    @endif
    @foreach ($num_orders as $num)
        <div>
            <hr style="height:8px;background-color:#1c5d99">
            @foreach ($orders as $order)
                @if ($order->id == $num->id && $order->id != $check)
                    <div style="margin-bottom: 20px;" class="row">
                        <div class="col-xl-4">
                            Khách hàng: {{ $order->customer }}
                            <div>
                                Địa chỉ: {{ $order->diachi }}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            Điện thoại: {{ $order->phone }}
                            <div>
                                Ngày đặt: {{ $order->created_at }}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            @if ($order->trangthai == 3)
                                <span class="badge badge-success">Hoàn thành</span>
                            @elseif ($order->trangthai == 2)
                                <span class="badge badge-primary">Đang giao</span>
                            @elseif ($order->trangthai == 1)
                                <span class="badge badge-warning">Chờ xác nhận</span>
                                <button style="float: right"
                                    onclick="confirm('Bạn có chắc muốn hủy đơn hàng không?') || event.stopImmediatePropagation()"
                                    wire:click="cancelOrder({{ $order->id }})" type="button">Hủy</button>
                            @else
                                <span class="badge badge-danger">Hủy</span>
                            @endif
                        </div>
                    </div>
                    @php
                        $check = $order->id;
                    @endphp
                @endif
            @endforeach
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Mã đơn hàng</th>
                            <th class="text-center">Sản phẩm</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Đơn giá</th>
                            <th class="text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @if ($order->id == $num->id)
                                <tr>
                                    <td class="text-center align-middle" scope="row">{{ $order->id }}</td>
                                    <td class="text-center align-middle">{{ $order->ten }}</td>
                                    <td class="text-center align-middle"> <img style="width:100px;height:100px"
                                            src="{{ url('uploads') }}/{{ $order->anh }}" alt="Picture"></td>
                                    <td class="text-center align-middle">{{ $order->soluong }}</td>
                                    <td class="text-center align-middle">{{ number_format($order->gia) }}</td>
                                    <td class="text-center align-middle">
                                        {{ number_format($order->gia * $order->soluong) }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
