<?php

namespace App\Http\Controllers;

use App\Models\SanphamDetail;
use Illuminate\Http\Request;

class SanphamDetailController extends Controller
{
    public function index()
    {
        $sanpham_id = request()->id;
        if ($key = request()->key) {
            $sanpham_detail = SanphamDetail::where('id', 'like', '%' . $key . '%')
                ->where('sanpham_id', $sanpham_id)->paginate(5);
        } else {
            $sanpham_detail = SanphamDetail::where('sanpham_id', $sanpham_id)->paginate(5);
        }
        return view('admin.sanpham_detail.index', compact('sanpham_detail', 'sanpham_id'));
    }

    public function create(SanphamDetail $sanpham_id)
    {
        dd($sanpham_id);
        return view('admin.sanpham_detail.create', compact('sanphams', 'sanpham_id'));
    }

    public function store(Request $request)
    {
        if (SanphamDetail::create($request->all())) {
            return redirect()->route('admin.sanpham_detail.index')->with('success', 'Thêm mới thành công!');
        }
    }

    public function edit(SanphamDetail $sanpham_detail)
    {
        return view('admin.sanpham_detail.edit', compact('sanpham_detail'));
    }

    public function update(Request $request, SanphamDetail $sanpham_detail)
    {
        // dd($sanpham_detail->sanpham_id);
        if ($sanpham_detail->update($request->all())) {

            return redirect()->route('admin.sanpham_detail.index', ['id' => $sanpham_detail->sanpham_id])->with('success', 'Cập nhật trạng thái thành công');
        }
    }
}
