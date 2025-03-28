<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;  

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news/{id}', [HomeController::class, 'detail'])->name('news.detail');
Route::post('/news/{id}/comment', [HomeController::class, 'comment'])->name('news.comment');
Route::get('/review', [HomeController::class, 'review'])->name('review');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost'])->name('register.post');
Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');


Route::get('/user', [UserController::class, 'index']);
Route::get('/product', [ProductController::class, 'index'])->name('products');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');;
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
