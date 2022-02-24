<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';

    protected $fillable = ['order_id','sanpham_id','soluong','gia'];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function sanpham(){
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
}
