@extends('layouts.admin')

@section('title', 'Cập nhật thông tin')

@section('content')
    <form action="{{ route('admin.sanpham_detail.update', $sanpham_detail->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    <select class="form-control" name="trangthai" id="trangthai">
                        <option value="2" @if ($sanpham_detail->trangthai == 2) selected='selected' @endif>Trong kho</option>
                        <option value="1" @if ($sanpham_detail->trangthai == 1) selected='selected' @endif>Xuất kho</option>
                        <option value="0" @if ($sanpham_detail->trangthai == 0) selected='selected' @endif>Đã bán</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
@endsection
