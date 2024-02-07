<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Show All the Products
    public function index()
    {
        $products = Product::all();

        return view("products.index", ["products" => $products]);
    }

    //Show Single Product
    public function show(Request $request, $name)
    {
        $product = Product::where('name', $name)->first();

        if (!$product) {
            return view('products.show', ['error' => 'Product not found']);
        }

        return view('products.show', ['product' => $product]);
    }

    //Check The Quantity Of The Product
    public function checkQuantity(Product $product, Request $request)
    {
        // dd($product,$request);
        $quantity = $request->quantity;
        $stockIn = $product->stockQuantity;
        if ((int)$quantity > (int)$stockIn) {
            return response()->json(["error", "Stock Not Enough For This Quantity"]);
        } else {
            return null;
        }
    }
}
