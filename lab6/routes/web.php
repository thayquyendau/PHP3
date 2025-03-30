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
    Route::get('/', [TinController::class, 'home'])->name('tin.moi');
    // Route::get('/lien-he', [TinController::class , 'lienhe']);
    // Route::get('/ct/{id}', [TinController::class, 'lay1tin']);
    // Route::get('/thongtinsv', [InFoStudent::class, 'info']);
    // Route::get('/tin/{id}', [TinController::class, 'chitiet'])->name('tin.id');
    // Route::get('/cat/{id}', [TinController::class, 'tintrongloai'])->name('cat.id');
    Route::get('/tin/ds', [TinController::class, 'index'])->name('tin.ds');
    Route::get('/tin/create', [TinController::class, 'create'])->name('tin.create');
    Route::post('/tin/store', [TinController::class, 'store'])->name('tin.store');
    Route::get('/tin/edit/{id}', [TinController::class, 'edit'])->name('tin.edit');
    Route::post('/tin/update/{id}', [TinController::class, 'update'])->name('tin.store');
    Route::get('/tin/delete/{id}', [TinController::class, 'destroy'])->name('tin.update');



// Route::get('/tintrongloai/{id}', function ($id) {
//     $query = DB::table('tin')
//         ->select('id', 'tieude', 'tomTat')
//         ->where('idLoai', '=', $id)
//         ->orderBy('ngayDang', 'desc');
//     $data = $query->get();

//     return view('tintrongloai', ['data' => $data, 'idLoai' => $id]);
// })->name('tin.loai');




// Route::get('/xemnhieu', function () {
//     $query = DB::table('tin')
//         ->select('id', 'tieude', 'xem', 'idLoai')
//         ->orderBy('xem', 'desc')
//         ->limit(10);
//     $data = $query->get();

//     return view('xemnhieu', ['data' => $data ]);
// })->name('tin.xemnhieu');

