@extends('layouts.admin')

@section('title', 'Thêm mới sản phẩm')

@section('content')
    <form action="{{ route('admin.sanpham.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="ten">Tên</label>
                    <input type="text" class="form-control" value="{{ old('ten') }}" name="ten" id="ten" aria-describedby="helpId" placeholder="">
                    @error('ten')
                        <small class="help-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <textarea class="form-control" value="{{ old('mota') }}" name="mota" id="mota" rows="5"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpu">CPU</label>
                            <input type="text" class="form-control" value="{{ old('cpu') }}" name="cpu" id="cpu" aria-describedby="helpId"
                                placeholder="CPU">
                            @error('cpu')
                                <small class="text-help text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ram">Ram</label>
                            <input type="text" class="form-control" value="{{ old('ram') }}" name="ram" id="ram" aria-describedby="helpId"
                                placeholder="Ram">
                            @error('ram')
                                <small class="text-help text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ocung">Ổ cứng</label>
                            <input type="text" class="form-control" value="{{ old('ocung') }}"  name="ocung" id="ocung" aria-describedby="helpId"
                                placeholder="Ổ cứng">
                            @error('ocung')
                                <small class="text-help text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="carddohoa">Card đồ họa</label>
                            <input type="text" class="form-control" value="{{ old('carddohoa') }}" name="carddohoa" id="carddohoa" aria-describedby="helpId"
                                placeholder="VGA">
                            @error('carddohoa')
                                <small class="text-help text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="manhinh">Màn hình</label>
                            <input type="text" class="form-control" value="{{ old('manhinh') }}" name="manhinh" id="manhinh" aria-describedby="helpId"
                                placeholder="Màn hình">
                            @error('manhinh')
                                <small class="text-help text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="danhsachanh">Danh sách ảnh
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#model_list">
                            <i class="fa fa-folder-open"></i>
                        </button>
                    </label>
                    {{-- <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"> --}}
                    <input type="hidden" id="danhsachanh" name="danhsachanh">

                    <div class="row" id="show_danhsachanh"></div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="nhomsanphamid">Nhóm sản phẩm</label>
                    <select class="form-control" name="nhomsanphamid" id="nhomsanphamid">
                        @foreach ($nhomsanphams as $nsp)
                            <option value={{ $nsp->id }}>{{ $nsp->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hangsanxuat">Hãng sản xuất</label>
                    <input type="text" class="form-control" value="{{ old('hangsanxuat') }}" name="hangsanxuat" id="hangsanxuat" aria-describedby="helpId"
                        placeholder="Hãng sản xuất">
                    @error('hangsanxuat')
                        <small class="text-help text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gia">Giá</label>
                    <input type="number" class="form-control" value="{{ old('gia') }}" name="gia" id="gia" aria-describedby="helpId"
                        placeholder="Giá">
                    @error('gia')
                        <small class="text-help text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="giaban">Giá bán</label>
                    <input type="number" class="form-control" value="{{ old('giaban') }}" name="giaban" id="giaban" aria-describedby="helpId"
                        placeholder="Giá bán">
                </div>

                <div class="form-group">
                    <label for="anh">Ảnh</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="anh" id="anh" aria-describedby="helpId" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#image_list">
                                    <i class="fas fa-image"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <img src="" id="show_img" style="width: 20%">
                </div>

                <div class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    <select class="form-control" name="trangthai" id="trangthai">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="uutien">Mức ưu tiên</label>
                    <input type="text" class="form-control" value="{{ old('uutien') }}" name="uutien" id="uutien" aria-describedby="helpId"
                        placeholder="">
                    @error('uutien')
                        <small class="help-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
    </form>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="model_list" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" rol e="document" style="max-width:900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('file/dialog.php?field_id=danhsachanh') }}"
                        style="width:100%; height:500px; overflow-y: auto; border:none"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="image_list" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" rol e="document" style="max-width:900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('file/dialog.php?field_id=anh') }}"
                        style="width:100%; height:500px; overflow-y: auto; border:none"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                placeholder: "Mô tả sản phẩm"
            })
        })


        $("#model_list").on('hidden.bs.modal', event => {
            var _links = $('input#danhsachanh').val();
            try {
                var _image_list = JSON.parse(_links);
            } catch (error) {
                var _image_list = [_links];
            }
            var _html = '';
            for (let i in _image_list) {
                let _img = "{{ url('public/uploads') }}" + '/' + _image_list[i];
                _html += '<div class="col-sm-2">';
                _html += '<img src="' + _img + '" alt="" style="width:100px">';
                _html += '</div>'
            }
            $('#show_danhsachanh').html(_html);
        });

        $("#image_list").on('hidden.bs.modal', event => {
            var _link = $('input#anh').val();
            var _img = "{{url('public/uploads')}}" + '/' + _link;
            $('#show_img').attr('src', _img);
        });
    </script>
@endsection
