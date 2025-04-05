<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Quan hệ: Một sản phẩm thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
