<?php
namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Http\Resources\LoaiSanPhamResource;

use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function index()
    {
        return LoaiSanPhamResource::collection(LoaiSanPham::all());
    }

    public function show($id)
    {
        return new LoaiSanPhamResource(LoaiSanPham::findOrFail($id));
    }

    public function store(Request $request)
    {
        $loaisanpham = LoaiSanPham::create($request->all());
        return new LoaiSanPhamResource($loaisanpham);
    }

    public function update(Request $request, $id)
    {
        $loaisanpham = LoaiSanPham::findOrFail($id);
        $loaisanpham->update($request->all());
        return new LoaiSanPhamResource($loaisanpham);
    }

    public function destroy($id)
    {
        $loaisanpham = LoaiSanPham::findOrFail($id);
        $loaisanpham->delete();
        return response()->json(null, 204);
    }
}
