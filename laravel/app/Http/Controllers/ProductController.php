<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Psy\debug;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = DB::table('products')->where('id', '=', 1)->get(); // lay theo id 
        // $products = DB::table('products')->get(); // foreach dung get de lay het
        // $products = DB::table('products')->first(); //dung de lay 1 dong

        //Cach 1: Lay danh muc bang cach su dung with thiet lap quan he
        // $products = Product::with('category') // Lấy thông tin danh mục
        // ->orderBy('id', 'DESC')
        // ->get();

        // Cach 2 : join truc tiep
        $products = DB::table('products')
            ->join('categories', 'products.id_category', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
        // dd($products);
        return view('product', compact('products'));
    }

    public function create()
    {
        $categories = DB::table('categories')->select('*')->get();
        return view('product-add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Xử lý upload hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Tạo tên file duy nhất
            $image->move(public_path('images'), $imageName); // Lưu vào public/images
            $path = 'images/' . $imageName; // Đường dẫn tương đối
        }


        // Lưu vào database
        $product = new Product;
        $product->name = $request->input('name');
        $product->id_category = $request->input('id_category');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->image = $path; // Lưu đường dẫn tương đối
        $product->save();

        return redirect()->route('products')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $categories = DB::table('categories')->select('*')->get();
        $product = (new Product)->find($id);
        return view('product-edit', compact('product', 'categories'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ]);

        // Xử lý upload hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $path = 'images/' . $imageName;
        } else {
            $path = Product::find($id)->image; // Giữ ảnh cũ nếu không upload ảnh mới
        }

        // $path = $request->file('image')->store('images', 'public');
        $product = (new Product)->find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $path;
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->save();

        return redirect()->route('products')->with('success', 'Sua sản phẩm thành công');
        // return redirect()->route('product.add')->with('error', 'vui long dien day du thong tin!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Tìm sản phẩm theo ID, nếu không tìm thấy sẽ ném ngoại lệ 404
    $product = Product::findOrFail($id);
    // Lấy đường dẫn ảnh từ cơ sở dữ liệu
    $imagePath = public_path($product->image);
    // Kiểm tra và xóa file ảnh nếu tồn tại
    if (file_exists($imagePath)) {
        unlink($imagePath); // Xóa file ảnh khỏi thư mục
    }
    // Xóa bản ghi sản phẩm khỏi cơ sở dữ liệu
    $product->delete();

    // Chuyển hướng về danh sách sản phẩm với thông báo thành công
    return redirect()->route('products')->with('success', 'Xóa sản phẩm thành công');
}
}
