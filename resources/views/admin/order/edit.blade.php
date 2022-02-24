@extends('layouts.admin')

@section('title', 'Cập nhật thông tin đơn hàng')

@section('content')
<form action="{{route('admin.order.update', $order->id)}}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="ten">Tên</label>
        <input type="text" value="{{$order->ten}}" class="form-control" name="ten" id="ten" aria-describedby="helpId" placeholder="">
        @error('ten')
            <div class="help-text text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" value="{{$order->email}}" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
        @error('email')
            <div class="help-text text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="mota">Mô tả</label>
        <textarea class="form-control" name="mota" id="mota" rows="5">{{$order->mota}}</textarea>
    </div>

    <div class="form-group">
        <label for="trangthai">Trạng thái</label>
        <select class="form-control" name="trangthai" id="trangthai">
            <option value="3" @if ($order->trangthai==3) selected='selected' @endif>Hoàn thành</option>
            <option value="2" @if ($order->trangthai==2) selected='selected' @endif>Đang giao</option>
            <option value="1" @if ($order->trangthai==1) selected='selected' @endif>Chờ xác nhận</option>
            <option value="0" @if ($order->trangthai==0) selected='selected' @endif>Hủy</option>
        </select>
    </div>

    <div class="form-group">
        <label for="phone">SĐT</label>
        <input type="number" value="{{$order->phone}}" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="">
        @error('phone')
            <div class="help-text text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input type="text" value="{{$order->diachi}}" class="form-control" name="diachi" id="diachi" aria-describedby="helpId" placeholder="">
        @error('diachi')
            <div class="help-text text-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection


@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('admin123') }}/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('js')
    <!-- Summernote -->
    <script src="{{ url('admin123') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#mota').summernote({
                height: 200,
                placeholder: "Mô tả"
            })
        })
    </script>
@endsection
