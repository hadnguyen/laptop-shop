<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sanpham;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Cart;

class ProductDetail extends Component
{
    public $id_p;
    public $rating;
    public $comment;
    public $sanpham_id;
    public $user_id;

    protected $listeners = ['storeRating'];
    public function mount($id_p)
    {
        $this->id_p = $id_p;
    }
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

    public function storeRating($rating, $sanpham_id)
    {
        $this->rating = $rating;
        $this->sanpham_id = $sanpham_id;
    }

    public function rate()
    {
        if ($this->rating && Auth::check()) {
            $review = new Review();
            $review->users_id = Auth::user()->id;
            $review->rating = $this->rating;
            $review->comment = $this->comment;
            $review->sanpham_id = $this->sanpham_id;
            // dd($review);
            $review->save();
            session()->flash('success', 'Gửi đánh giá thành công!');
            return redirect()->route('productdetail',$this->id_p);
        }
        else{
            session()->flash('error', 'Đăng nhập để có thể bình luận');
            return redirect()->route('productdetail',$this->id_p);
        }
    }

    public function render()
    {
        $product = Sanpham::where('id',$this->id_p)->first();
        $reviews = Review::where('sanpham_id',$this->id_p)->get();
        $avg_rating =  $reviews->avg('rating');
        $related_product = Sanpham::where('nhomsanphamid',$product->nhomsanphamid)
        ->where('hangsanxuat', $product->hangsanxuat)->where('id','!=',$this->id_p)->get();
        $imgs = json_decode($product->danhsachanh);
        $this->emitTo('cart-counter', 'postCartProcessed');
        return view('livewire.product-detail', compact('product','reviews','avg_rating','related_product','imgs'))->layout('layouts.detail');
    }
}
