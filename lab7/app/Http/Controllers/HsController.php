<?php 
namespace App\Http\Controllers;

use App\Models\Hs;
use Illuminate\Http\Request;

class HsController extends Controller
{
    public function hs()
    {
        return view('nhaphs'); // Hiển thị form nhập học sinh
    }

    public function hs_store(Request $request)
    {
        $request->validate([
            'hoten' => ['required', 'min:3', 'max:20'],
            'tuoi' => ['required', 'integer', 'min:16', 'max:100'],
            'ngaysinh' => ['required', 'date'],
        ]);

        Hs::create($request->all()); // Lưu thông tin học sinh vào database

        return back()->with('success', 'Học sinh đã được lưu thành công!');
    }
}
