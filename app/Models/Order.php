<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['ten','mota','email','phone','diachi','trangthai'];

    //join 1 - many
    public function details(){
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
