<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Show All the Products
    public function index()
    {
        $products = Product::all();

        return view("products.index", ["products" => $products]);
    }

    
    public function show(Request $request, $name)
    {
        $product = Product::where('name', $name)->first();

        if (!$product) {
            return view('products.show', ['error' => 'Product not found']);
        }

        return view('products.show', ['product' => $product]);
    }
}
