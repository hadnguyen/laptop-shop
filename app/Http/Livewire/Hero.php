<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nhomsanpham;
use App\Models\Sanpham;

class Hero extends Component
{
    public $home;

    public function render()
    {
        $nhomsanpham = Nhomsanpham::orderby('uutien', 'desc')->get();
        $sanpham = Sanpham::all();
        return view('livewire.hero', compact('nhomsanpham', 'sanpham'));
    }
}
