<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CartCounter extends Component
{
    protected $listeners = ['postCartProcessed' => 'updateCartInfo', 'updateOrderInfo'];

    public $user_id;
    public $order_id;
    public $order_count;

    public function updateCartInfo()
    {

    }

    public function updateOrderInfo($order_count)
    {
        $this->$order_count = $order_count;
    }

    public function render()
    {
        if(Auth::check()){
            $this->user_id = Auth::user()->id;
            $this->order_count = Order::where('users_id',$this->user_id)
            ->where('trangthai', '!=', 0)->count();
            // $this->order_count = OrderDetail::where('order_id',$this->order_id->id)->count();
        }
        else{
            $this->order_count = 0;
        }
        return view('livewire.cart-counter');
    }
}
