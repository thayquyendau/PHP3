<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function index()
    {
        $dsLoai = LoaiSanPham::all();
        return response()->json($dsLoai);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_loai' => 'required|string|max:255'
        ]);

        $loai = LoaiSanPham::create($validated);
        return response()->json($loai, 201);
    }

    public function show($id)
    {
        $loai = LoaiSanPham::findOrFail($id);
        return response()->json($loai);
    }

    public function update(Request $request, $id)
    {
        $loai = LoaiSanPham::findOrFail($id);

        $validated = $request->validate([
            'ten_loai' => 'required|string|max:255'
        ]);

        $loai->update($validated);
        return response()->json($loai);
    }

    public function destroy($id)
    {
        $loai = LoaiSanPham::findOrFail($id);
        $loai->delete();
        return response()->json(null, 204);
    }
}
