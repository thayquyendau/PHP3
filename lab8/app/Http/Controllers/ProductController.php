<?php
namespace App\Http\Controllers;

use App\Models\Product;
// use App\Http\Resources\Product as ProductResource;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
