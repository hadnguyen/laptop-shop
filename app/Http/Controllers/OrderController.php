<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\SanphamDetail;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::orderBy("created_at", "DESC")->paginate(5);
        if ($key = request()->key) {
            $data = Order::where('ten', 'like', '%' . $key . '%')->paginate(5);
        }
        // dd($data);

        return view('admin.order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order_id = $order->id;
        $orders = OrderDetail::where('order_id', $order->id)->get();
        // dd($orders);
        return view('admin.order.detail', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // $users=User::where('status',1)->select('id','name')->get();
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate(
            [
                "ten" => 'required',
                "email" => 'required|email',
                "phone" => 'required',
                "diachi" => 'required',
            ],
            [
                "ten.required" => "Cần nhập tên",
                "email.required" => "Cần nhập email",
                "phone.required" => "Cần nhập số điện thoại",
                "diachi.required" => "Cần nhập địa chỉ"
            ]
        );
        // dd(date($order->created_at));
        $order_date = date($order->created_at);
        if ($request->trangthai == 0) {
            SanphamDetail::where('updated_at', '=', $order_date)->update(['trangthai' => 2]);
        }
        if ($order->update($request->all())) {
            return redirect()->route('admin.order.index')->with('success', 'Cập nhật bản ghi thành công');
        } else {
            return redirect()->route('admin.order.index')->with('error', "Lỗi cập nhật bản ghi");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("admin.order.index")->with('success', "Xóa bản ghi thành công!");
    }
}
