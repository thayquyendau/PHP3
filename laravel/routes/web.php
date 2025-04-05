<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 // Product
 Route::get('/product', [ProductController::class, 'index'])->middleware(['auth.basic'])->name('products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');;
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

    //category
    Route::get('/category', [ProductController::class, 'category'])->name('category');
});

require __DIR__ . '/auth.php';
