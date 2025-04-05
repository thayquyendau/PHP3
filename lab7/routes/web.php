    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;  
    use App\Http\Controllers\HsController;
use App\Http\Controllers\SendEmailController;
use App\Models\sendEmail;

    Route::get('/', function () {
        return view('home');
    })->name('home');
    

    Route::get("hs", [HsController::class, 'hs']);
    Route::post("hs", [HsController::class, 'hs_store'])->name('hs_store');
    

    Route::get('/send-email', [SendEmailController::class, 'sendEmail']);

