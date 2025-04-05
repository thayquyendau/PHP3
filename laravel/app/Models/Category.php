<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{      
    // Quan he mot danh muc co nhieu san pham
    public function products()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }
}
