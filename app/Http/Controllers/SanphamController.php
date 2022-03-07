<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;
use App\Models\Nhomsanpham;
use App\Models\SanphamDetail;
use Illuminate\Support\Facades\File;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($key = request()->key) {
            $data = Sanpham::where('ten', 'like', '%' . $key . '%')->orderby('uutien', 'DESC')->paginate(5);
        } else {
            $data = Sanpham::orderby('uutien', 'DESC')->paginate(5);
        }
        return view('admin.sanpham.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhomsanphams = Nhomsanpham::orderby('ten')->where('trangthai', 1)->select('id', 'ten')->get();
        return view('admin.sanpham.create', compact('nhomsanphams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->nhomsanphamid == 1) {
            $request->validate(
                [
                    "ten" => 'required|unique:sanpham',
                    "gia" => 'required',
                    'hangsanxuat' => 'required',
                    "uutien" => 'required',
                    "cpu" => 'required',
                    "ram" => 'required',
                    'ocung' => 'required',
                    'carddohoa' => 'required',
                    'manhinh' => 'required'
                ],
                [
                    "ten.required" => "Cần nhập tên sản phẩm",
                    "ten.unique" => "Tên sản phẩm không trùng nhau",
                    "uutien.required" => "Cần nhập mức độ ưu tiên",
                    "gia.required" => "Cần nhập giá sản phẩm",
                    "hangsanxuat.required" => "Cần nhập hãng sản xuất",
                    "cpu.required" => "Cần nhập cpu",
                    "ram.required" => "Cần nhập ram",
                    "ocung.required" => "Cần nhập ổ cứng",
                    "carddohoa.required" => "Cần nhập card đồ họa",
                    "manhinh.required" => "Cần nhập màn hình"
                ]
            );
        } else {
            $request->validate(
                [
                    "ten" => 'required|unique:sanpham',
                    "gia" => 'required',
                    'hangsanxuat' => 'required',
                    "uutien" => 'required',
                ],
                [
                    "ten.required" => "Cần nhập tên sản phẩm",
                    "ten.unique" => "Tên sản phẩm không trùng nhau",
                    "uutien.required" => "Cần nhập mức độ ưu tiên",
                    "gia.required" => "Cần nhập giá sản phẩm",
                    "hangsanxuat.required" => "Cần nhập hãng sản xuất",
                ]
            );
        }
        // if ($request->hasFile('file_upload')) {
        //     $file = $request->file_upload;
        //     $filename = time() . '-sp.' . $file->getClientOriginalExtension();

        //     $file->move(public_path('uploads'), $filename);

        //     $request->merge(["anh" => $filename]);
        //
        // }

        if (Sanpham::create($request->all())) {
            return redirect()->route('admin.sanpham.index')->with('success', 'Thêm mới sản phẩm thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show(Sanpham $sanpham)
    {
        $sanpham_id = $sanpham->id;
        // dd($sanpham);
        if ($key = request()->key) {
            $sanpham_detail = SanphamDetail::where('id', 'like', '%' . $key . '%')
                ->where('sanpham_id', $sanpham_id)->paginate(5);
        } else {
            $sanpham_detail = SanphamDetail::where('sanpham_id', $sanpham_id)->paginate(5);
        }
        // dd($sanpham_detail);
        return view('admin.sanpham_detail.index', compact('sanpham_detail', 'sanpham_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit(Sanpham $sanpham)
    {
        $nhomsanphams = Nhomsanpham::orderby('ten')->where('trangthai', 1)->select('id', 'ten')->get();
        return view('admin.sanpham.edit', ['sanpham' => $sanpham, 'nhomsanphams' => $nhomsanphams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sanpham $sanpham)
    {
        if ($request->nhomsanphamid == 1) {
            $request->validate(
                [
                    "ten" => 'required|unique:nhomsanpham,ten,' . $sanpham->id,
                    "uutien" => 'required',
                    "gia" => 'required',
                    "hangsanxuat" => 'required',
                    "cpu" => 'required',
                    "ram" => 'required',
                    'ocung' => 'required',
                    'carddohoa' => 'required',
                    'manhinh' => 'required'
                ],
                [
                    "ten.required" => "Cần nhập tên sản phẩm",
                    "ten.unique" => "Tên nhóm sản phẩm không trùng nhau",
                    "uutien.required" => "Cần nhập mức độ ưu tiên của sản phẩm",
                    "gia.required" => "Cần nhập giá sản phẩm",
                    "hangsanxuat.required" => "Cần nhập hãng sản xuất",
                    "cpu.required" => "Cần nhập cpu",
                    "ram.required" => "Cần nhập ram",
                    "ocung.required" => "Cần nhập ổ cứng",
                    "carddohoa.required" => "Cần nhập card đồ họa",
                    "manhinh.required" => "Cần nhập màn hình"
                ]
            );
        } else {
            $request->validate(
                [
                    "ten" => 'required|unique:nhomsanpham,ten,' . $sanpham->id,
                    "uutien" => 'required',
                    "gia" => 'required',
                    "hangsanxuat" => 'required',
                ],
                [
                    "ten.required" => "Cần nhập tên sản phẩm",
                    "ten.unique" => "Tên nhóm sản phẩm không trùng nhau",
                    "uutien.required" => "Cần nhập mức độ ưu tiên của sản phẩm",
                    "gia.required" => "Cần nhập giá sản phẩm",
                    "hangsanxuat.required" => "Cần nhập hãng sản xuất"
                ]
            );
        }

        // $boldelete=false;
        // if ($request->hasFile('file_upload')){
        //     $file = $request->file_upload;
        //     $filename = time() . '-sp.' . $file->getClientOriginalExtension();

        //     $file->move(public_path('uploads'), $filename);

        //     $request->merge(["anh" => $filename]);-
        //     $boldelete=true;
        // }
        // else{
        //     $request->merge(["anh" => $sanpham->anh]);
        // }

        // if ($boldelete){
        //     File::delete(public_path('uploads') .'/' . $sanpham->anh);
        // }

        if ($sanpham->update($request->all())) {
            return redirect()->route('admin.sanpham.index')->with('success', 'Cập nhật bản ghi thành công');
        } else {
            return redirect()->route('admin.sanpham.index')->with('error', "Lỗi cập nhật bản ghi");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sanpham $sanpham)
    {
        if ($sanpham->details()->count() > 0) {
            return redirect()->route("admin.sanpham.index")->with('error', "Không thể xóa sản phẩm này do đang có trong đơn hàng");
        } else {
            $sanpham->delete();
            return redirect()->route("admin.sanpham.index")->with('success', "Xóa bản ghi thành công!");
        }
    }
}
