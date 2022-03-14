@extends('layouts.admin')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="row my-2">
        <div class="col-md-8">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" name="key" value="{{ request()->key }}" class="form-control" placeholder="Từ khóa"
                        aria-describedby="helpId">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('admin.sanpham_detail.show', $sanpham_id) }}" role="button">Thêm
                    mới</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Trạng thái</th>
                <th>Ngày nhập</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanpham_detail as $d)
                <tr>
                    <td scope="row">{{ $d->id }}</td>
                    <td>
                        @if ($d->trangthai == 2)
                            <span class="badge badge-primary">Trong kho</span>
                        @elseif ($d->trangthai == 1)
                            <span class="badge badge-info">Đã bán</span>
                        @endif
                    </td>
                    <td>{{ $d->created_at }}</td>
                    <td class="text-right">
                        <a name="" id="" class="btn btn-primary btn-sm"
                            href="{{ route('admin.sanpham_detail.edit', $d->id) }}" role="button">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sanpham_detail->appends(Request::all())->links() }}
@endsection
