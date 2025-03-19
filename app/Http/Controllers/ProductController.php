<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::orderBy('id', 'DESC')->get();

        return view('product', compact('products'));
    }

    public function create()
    {

        return view('product-add');
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
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
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
        ]);

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
