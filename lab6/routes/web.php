<?php

use  App\Http\Controllers\Controller;
use App\Http\Controllers\QuanTriTinController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Quantri;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', Quantri::class])->group(function () {
    Route::get('quantritin', [QuanTriTinController::class, 'index']);
});

Route::get('/basic-auth', function () {
    return "Chỉ người dùng được xác thực mới thấy nội dung này!";
})->middleware('auth.basic');

Route::get('download', function () {
    return view("download");
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
