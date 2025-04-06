<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Middleware\AuthAdmin;
use Illuminate\Container\Attributes\Auth;
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


//Midedleware
Route::middleware([AuthAdmin::class, 'handle'])->group(function () {
    // Quản lí tin tức
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.list');
    Route::get('/news-add', [NewsController::class, 'create'])->name('admin.news.add');
    Route::post('/news-store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');

    // Quản lí danh mục
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.list');
    Route::get('/category-add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
});