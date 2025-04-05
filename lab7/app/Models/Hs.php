<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hs extends Model
{
    use HasFactory;

    protected $fillable = [
        'hoten', 'tuoi', 'ngaysinh'
    ];
}

