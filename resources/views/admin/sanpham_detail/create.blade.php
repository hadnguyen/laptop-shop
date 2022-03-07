@extends('layouts.admin')

@section('title', 'Thêm 1 đơn vị sản phẩm')

@section('content')
    <form action="{{ route('admin.sanpham_detail.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    <select class="form-control" name="trangthai" id="trangthai">
                        <option value="2">Trong kho</option>
                        <option value="1">Xuất kho</option>
                        <option value="0">Đã bán</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
    </form>
@endsection
