<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nhomsanpham;
use App\Models\Sanpham;

class Hero extends Component
{
    public $home;
    public $key = null;

    public function search()
    {
        return redirect()->route('shopsearch');
    }
    public function render()
    {
        $this->emit('updateSearch', $this->key);

        $nhomsanpham = Nhomsanpham::orderby('uutien','desc')->get();
        $sanpham = Sanpham::all();
        return view('livewire.hero', compact('nhomsanpham', 'sanpham'));
    }
}
