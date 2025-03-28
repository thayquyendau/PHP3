<?php

use App\Http\Controllers\InFoStudent;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;  

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [TinController::class, 'index']);
Route::get('/lien-he', [TinController::class , 'lienhe']);
Route::get('/ct/{id}', [TinController::class, 'lay1tin']);
Route::get('thongtinsv', [InFoStudent::class, 'info']);

Route::get('/xemnhieu', function () {
    $query = DB::table('tin')
        ->select('id', 'tieude', 'xem', 'idLoai')
        ->orderBy('xem', 'desc')
        ->limit(10);
    $data = $query->get();

    return view('xemnhieu', ['data' => $data ]);
})->name('tin.xemnhieu');

Route::get('/tinmoi', function () {
    $query = DB::table('tin')
        ->select('id', 'tieude', 'tomTat', 'ngayDang')
        ->orderBy('ngayDang', 'desc')
        ->limit(10);
    $data = $query->get();

    return view('tinmoi', ['data' => $data]);
})->name('tin.moi');

Route::get('/tintrongloai/{id}', function ($id) {
    $query = DB::table('tin')
        ->select('id', 'tieude', 'tomTat')
        ->where('idLoai', '=', $id)
        ->orderBy('ngayDang', 'desc');
    $data = $query->get();

    return view('tintrongloai', ['data' => $data, 'idLoai' => $id]);
})->name('tin.loai');

Route::get('/tin/{id}', function ($id) {
    $tin = DB::table('tin')->where('id', $id)->first();
    return view('chitiettin', ['tin' => $tin]);
})->name('tin.id'); 