<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    public $fillable = ['id','name', 'price'. 'id_category'];
    // Quan hệ: Một sản phẩm thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
