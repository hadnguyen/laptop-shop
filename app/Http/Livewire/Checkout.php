<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\SanphamDetail;
use Illuminate\Support\Facades\Auth;
use Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Tên không được để trống',
        'email.required' => 'Email không được để trống',
        'email.email' => 'Email không đúng định dạng',
        'phone.required' => 'SĐT không được để trống',
        'address.required' => 'Địa chỉ không được để trống',
    ];

    public function store()
    {
        if (Auth::check()) {
            $this->validate();
            $order = new Order();
            $order->users_id = Auth::user()->id;
            $order->ten = $this->name;
            $order->email = $this->email;
            $order->phone = $this->phone;
            $order->diachi = $this->address;
            $order->save();
            // dd($order);
            $items = Cart::content();
            foreach ($items as $i) {
                $order_item = new OrderDetail();
                $order_item->sanpham_id = $i->id;
                $order_item->order_id = $order->id;
                $order_item->gia = $i->price;
                $order_item->soluong = $i->qty;
                $order_item->save();
                SanphamDetail::take($order_item->soluong)->where('trangthai', 2)->where('sanpham_id',  $order_item->sanpham_id)
                    ->update(['trangthai' => 1]);
                // dd($order_item);
            }
            Cart::destroy();
            $user_id = Auth::user()->id;
            $order_count = Order::where('users_id', $user_id)->count();
            $this->emitTo('cart-counter', 'updateOrderInfo', $order_count);
            return redirect()->route('order');
        } else {
            session()->flash('error', 'Đăng nhập để gửi đơn hàng!');
        }
    }
    public function render()
    {
        $items = Cart::content();
        // return view('livewire.checkout', compact('items'))->layout('layouts.base');
        return view('livewire.checkout', compact('items'));
    }
}
