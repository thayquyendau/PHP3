    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;  

   // Ví dụ nếu bạn có route web khác (không phải API)
Route::get('/', function () {
    return view('welcome');
});

 
