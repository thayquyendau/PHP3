<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Psy\debug;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $news = DB::table('news')->where('id', '=', 1)->get(); // lay theo id 
        // $news = DB::table('news')->get(); // foreach dung get de lay het
        // $products = DB::table('products')->first(); //dung de lay 1 dong

        //Cach 1: Lay danh muc bang cach su dung with thiet lap quan he
        // $products = Product::with('category') // Lấy thông tin danh mục
        // ->orderBy('id', 'DESC')
        // ->get();

        // dd('ok');
        // Cach 2 : join truc tiep
        $news = DB::table('news')
            ->join('categories', 'news.id_category', '=', 'categories.id')
            ->select('news.*', 'categories.name as category_name')
            ->get();
        // dd($news);
        return view('admin/news', compact('news'));
    }

    public function create()
    {   
        // dd('ok');
        $data = News::all();
        $categories = DB::table('categories')->select('*')->get();
        return view('admin/news-add', compact('categories', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation rules
    $request->validate([
        'id_category' => 'required|integer|exists:categories,id',
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:10000', // Sửa max:10,000 thành max:10000 (không dùng dấu phẩy)
        'author' => 'required|string|max:100',
        'status' => 'required|in:draft,published',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sửa 'img' thành 'image'
    ]);

    // Xử lý upload hình ảnh
    $path = null; // Khởi tạo $path để tránh lỗi undefined
    if ($request->hasFile('img')) {
        $img = $request->file('img');
        $imgName = time() . '_' . $img->getClientOriginalName(); // Tạo tên file duy nhất
        $img->move(public_path('images'), $imgName); // Lưu vào thư mục public/images
        $path = 'images/' . $imgName; // Đường dẫn tương đối
    }

    // Lưu vào database
    $new = new News;
    $new->title = $request->input('title');
    $new->id_category = $request->input('id_category');
    $new->content = $request->input('content');
    $new->author = $request->input('author');
    $new->status = $request->input('status');
    $new->img = $path; // Lưu đường dẫn ảnh
    $new->views = 0;
    $new->created_at = now(); // Gán thời gian hiện tại cho created_at
    $new->save();

    return redirect()->route('admin.news.list')->with('success', 'Thêm sản phẩm thành công');
}

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $categories = DB::table('categories')->select('*')->get();
        $new = (new News)->find($id);
        return view('admin/news-edit', compact('new', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // $path = $request->file('image')->store('images', 'public');
        $new = (new News)->find($id);
        $new->name = $request->input('name');
        $new->price = $request->input('price');
        $new->description = $request->input('description');
        $new->stock = $request->input('stock');
        $new->save();

        if ($new->save()) {
            return redirect()->route('admin.news.list')->with('success', 'Sua sản phẩm thành công');
        }
        // return redirect()->route('new.add')->with('error', 'vui long dien day du thong tin!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::find($id)->delete();
        return redirect()->route('admin.news.list')->with('success', 'Xoa sản phẩm thành công');
    }
}
