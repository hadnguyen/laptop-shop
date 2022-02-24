<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderCounter extends Component
{
    public $check = 0;

    public function cancelOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->trangthai = 0;
        // dd($order);
        $order->save();
        session()->flash('success', 'Hủy đơn hàng thành công!');
        return redirect()->route('order');
    }
    public function render()
    {
        $orders = DB::table('order')->where('users_id', Auth::user()->id)->where('order.trangthai', '!=', 0)
        ->join('order_detail', 'order.id', '=', 'order_id')
        ->join('sanpham', 'sanpham_id', '=', 'sanpham.id')
        ->select('order.id','order.ten as customer', 'order.phone', 'order.diachi', 'order.trangthai','order.created_at',
        'order_detail.soluong','order_detail.gia','sanpham.ten','sanpham.anh')->get();
        // dd($orders);
        $num_orders = Order::where('users_id', Auth::user()->id)
        ->where('trangthai', '!=', 0)->orderBy("created_at", "DESC")->select('id')->get();
        // dd($num_orders);
        return view('livewire.order-counter', compact('orders', 'num_orders'));
    }
}
