<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Nullable;

use function Psy\debug;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = DB::table('categories')
            ->select('*')
            ->get();
        // dd($categories);
        return view('admin/categories', compact('categories'));
    }

    public function create()
    {   
        
        return view('admin/category-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation rules
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
    ]);
    
   

    // Lưu vào database
    $category = new Category();
    $category->name = $request->input('name');
    $category->created_at = now(); 
    $category->updated_at = null;
    $category->save();
    return redirect()->route('admin.category.list')->with('success', 'Thêm danh mục thành công');
   
}

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin/category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);
    
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->updated_at = now(); // Cập nhật thời gian sửa đổi
        $category->save();

        return redirect()->route('admin.category.list')->with('success', 'Sửa danh mục thành công');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Xóa tất ca các bài viết thuộc danh mục này
        $news = News::where('id_category', $id)->get();
        foreach ($news as $item) {
            unlink(public_path( $item->img)); // Xóa ảnh 
            $item->delete();
        }
        // Xóa danh mục
         Category::findOrFail($id)->delete();
        return redirect()->route('admin.category.list')->with('success', 'Xóa danh mục thành công');
    }
}
