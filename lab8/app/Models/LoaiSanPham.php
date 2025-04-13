<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = 'loaisanphams'; // hoặc 'categories' nếu bạn đặt tên vậy
    protected $fillable = ['ten_loai'];
}
