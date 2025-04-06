<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Quan hệ: Một tin tức thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
