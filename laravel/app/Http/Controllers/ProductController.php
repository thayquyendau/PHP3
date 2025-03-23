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
    {    $categories = DB::table('categories')->select('*')->get();
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
    
        $path = $request->file('image')->store('images', 'public');
        $product = new Product;
        $product->name = $request->input('name');
        $product->id_category = $request->input('id_category');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->image = $path;
        $product->save();
    
        return redirect()->route('products')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {

        $product = (new Product)->find($id);
        return view('product-edit', compact('product'));
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
        $product = (new Product)->find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->save();

        if ($product->save()) {
            return redirect()->route('products')->with('success', 'Sua sản phẩm thành công');
        }
        // return redirect()->route('product.add')->with('error', 'vui long dien day du thong tin!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect()->route('products')->with('success', 'Xoa sản phẩm thành công');
    }
}
