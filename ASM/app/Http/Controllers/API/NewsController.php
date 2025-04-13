<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_category' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255|unique:news,title',
            'content' => 'required|string|max:10000',
            'author' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sửa 'img' thành 'image'
        ]);

        $news = News::create($validated);
        return response()->json($news, 201);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:news,title,' . $id,
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'views' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_category' => 'required|exists:categories,id'
        ]);

        $news->update($validated);
        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return response()->json(null, 204);
    }
}
