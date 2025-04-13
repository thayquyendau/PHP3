<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\LoaiSanPhamController;


// products
Route::apiResource('products', ProductController::class);



Route::apiResource('loaisanpham', LoaiSanPhamController::class);

