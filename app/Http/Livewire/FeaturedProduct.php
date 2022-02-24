<?php

namespace App\Http\Livewire;

use App\Models\Sanpham;
use Livewire\Component;
use Cart;

class FeaturedProduct extends Component
{
    public function store($product_id, $product_name, $product_price, $product_sale = null)
    {
        if ($product_sale)
        {
            Cart::add($product_id, $product_name, 1, $product_sale);
        }
        else
        {
            Cart::add($product_id, $product_name, 1, $product_price);
        }
        return redirect()->route('cart');
    }

    public function render()
    {
        $laptops = Sanpham::where('nhomsanphamid', 1)->take(8)->get();
        $rams = Sanpham::where('nhomsanphamid', 2)->get();
        return view('livewire.featured-product', compact('laptops', 'rams'));
    }
}
