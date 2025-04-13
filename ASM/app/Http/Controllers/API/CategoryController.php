<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $dsLoai = Category::all();
        return response()->json($dsLoai);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $loai = Category::create($validated);
        return response()->json($loai, 201);
    }

    public function show($id)
    {
        $loai = Category::findOrFail($id);
        return response()->json($loai);
    }

    public function update(Request $request, $id)
    {
        $loai = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $loai->update($validated);
        return response()->json($loai);
    }

    public function destroy($id)
    {
        $loai = Category::findOrFail($id);
        $loai->delete();
        return response()->json(null, 204);
    }
}
