<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\CategoryController;


Route::apiResource('news', NewsController::class);

Route::apiResource('category', CategoryController::class);

