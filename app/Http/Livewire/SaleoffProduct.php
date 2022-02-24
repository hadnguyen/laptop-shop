<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sanpham;
use Cart;
use Livewire\WithPagination;


class SaleoffProduct extends Component
{
    // public $key = null;

    // protected $listeners = ['updateSearch'];

    // public function updateSearch($key)
    // {
    //     $this->key = $key;
    // }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\SanPham');
        session()->flash('success', 'Thêm mới sản phẩm vào rỏ hàng thành công!');
        return redirect()->route('cart');
    }

    // public function storeproduct($product_id, $product_name, $product_price)
    // {
    //     Cart::add($product_id, $product_name, 1, $product_price);
    //     return redirect()->route('productdetail', $product_id);
    // }

    public function render()
    {
        // if (!is_null($this->key)) {
        //     $products = Sanpham::where('ten', 'like', '%' . $this->key . '%')
        //         ->whereNotNull('giaban')->orderByRaw("giaban/gia ASC")->take(5)->get();
        // } else {
        //     $products = Sanpham::whereNotNull('giaban')->orderByRaw("giaban/gia ASC")->take(5)->get();
        // }
        // dd($this->key);
        // $this->key = 'MSI';
        // $products = Sanpham::where('ten', 'like', '%' . $this->key . '%')
        //         ->whereNotNull('giaban')->orderByRaw("giaban/gia ASC")->take(5)->get();
        // dd($products);
        $products = Sanpham::whereNotNull('giaban')->where('nhomsanphamid', 1)
        ->orderByRaw("giaban/gia ASC")->take(5)->get();
        return view('livewire.saleoff-product', compact('products'));
    }
}
