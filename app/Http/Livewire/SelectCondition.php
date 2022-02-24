<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nhomsanpham;
use App\Models\Sanpham;


class SelectCondition extends Component
{
    public $selectionCatid=null;

    public $pMin;
    public $pMax;
    public $minPrice;
    public $maxPrice;
    public $ram=null;
    public $hsx=null;

    public function mount(){

        $this->pMin=intval(Sanpham::min('gia'));
        $this->pMax=intval(Sanpham::max('gia'));
        $this->minPrice=$this->pMin;
        $this->maxPrice=$this->pMax;
        $this->emit('updateSelection', $this->selectionCatid, $this->minPrice, $this->maxPrice);

    }

    public function updatePrice($minPrice, $maxPrice){
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;

        $this->emit('updateSelection', $this->selectionCatid, $this->minPrice, $this->maxPrice);
    }

    public function selectCategory($catid){
        if ($this->selectionCatid==$catid){
            $this->selectionCatid=null;
        }else {
            $this->selectionCatid=$catid;
        }

        $this->emit('updateSelection', $this->selectionCatid, $this->minPrice, $this->maxPrice);
    }

    public function render()
    {
        $this->emit('updateRam', $this->ram);
        $this->emit('updateHSX', $this->hsx);
        // dd($this->ram);
        // dd($this->hsx);
        $categories = Nhomsanpham::all();
        $products = Sanpham::all();
        return view('livewire.select-condition', compact('categories', 'products'));
    }
}
