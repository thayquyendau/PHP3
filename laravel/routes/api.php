<?php
// Sử dụng khi lập trình với mobile app để sử dụng api thao tác gửi dữ liệu mà ko làm việc trực tiếp với DB
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

    Route::apiResource('products', ProductController::class);

?>