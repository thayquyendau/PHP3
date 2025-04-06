<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoaiSanPhamController;


// products
Route::apiResource('products', ProductController::class);



Route::apiResource('loaisanpham', LoaiSanPhamController::class);

