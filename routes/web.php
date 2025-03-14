<?php

use App\Http\Controllers\InFoStudent;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [TinController::class, 'index']);
Route::get('/lien-he', [TinController::class , 'lienhe']);
Route::get('/ct/{id}', [TinController::class, 'lay1tin']);
Route::get('thongtinsv', [InFoStudent::class, 'info']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'addProduct'])->name('product.add');



