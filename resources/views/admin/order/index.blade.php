@extends('layouts.admin')

@section('title', 'Đơn hàng')

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
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tài khoản đặt hàng</th>
                <th>Tên người nhận</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th class="text-right"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td scope="row">{{ $d->id }}</td>
                    <td>{{ $d->user->email }}</td>
                    <td>{{ $d->ten }}</td>
                    <td>
                        @if ($d->trangthai == 3)
                            <span class="badge badge-success">Hoàn thành</span>
                        @elseif ($d->trangthai == 2)
                            <span class="badge badge-primary">Đang giao</span>
                        @elseif ($d->trangthai == 1)
                            <span class="badge badge-warning">Chờ xác nhận</span>
                        @else
                            <span class="badge badge-danger">Hủy</span>
                        @endif
                    </td>
                    <td>{{ $d->created_at }}</td>
                    <td class="text-right">
                        <a name="" id="" class="btn btn-info btn-sm" href="{{ route('admin.order.show', $d->id) }}"
                            role="button">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.order.edit', $d->id) }}"
                            role="button">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a name="" id="" class="btn btn-danger btn-sm btnDelete"
                            href="{{ route('admin.order.destroy', $d->id) }}" role="button">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->appends(Request::all())->links() }}

    <form action="" method="POST" id="frmDelete">
        @csrf @method('DELETE')
    </form>
@endsection

@section('js')

    <script>
        $(".btnDelete").click(function(ev) {
            ev.preventDefault();
            let _href = $(this).attr('href');
            $("#frmDelete").attr('action', _href);
            if (confirm("Bạn muốn xóa bản ghi này không?")) {
                $("#frmDelete").submit();
            }
        });
    </script>

@endsection
