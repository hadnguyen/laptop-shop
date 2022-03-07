<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanphamDetail extends Model
{
    use HasFactory;
    protected $table = 'chitiet_sanpham';
    protected $fillable = ['trangthai', 'sanpham_id'];
    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
}
