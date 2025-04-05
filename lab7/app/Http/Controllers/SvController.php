<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\RuleNhapSV;
use App\Models\Sinhvien;
use Illuminate\Http\Request;

class SvController extends Controller
{
    public function sv()
    {
        return view('nhapsv');
    }

    public function sv_store(RuleNhapSV $request)
    {
        // Nếu xác thực thành công, lưu thông tin sinh viên
        Sinhvien::create($request->validated());

        return back()->with('success', 'Sinh viên đã được lưu thành công!');
    }
}
