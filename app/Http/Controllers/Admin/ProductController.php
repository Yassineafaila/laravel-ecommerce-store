<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view("admin.products.index", ["products" => $products]);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("admin.products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $formFields = $request->validate([
            "name" => "required",
            "description" => "required|min:50",
            "price" => "required",
            "stockQuantity" => "required",
            "rating" => "required",
            "image" => "required"
        ]);
        //check if the image is upload
        if ($request->hasFile("image")) {
            $formFields["image"] = $request->file("image")->store("products", "public");
        }

        // check the role of this user
        if (Auth::user()->hasRole("admin")) {
            $product = Product::create($formFields);
            $product->categories()->attach($request->categories);
            return redirect("/admin/dashboard")->with("success", "The Product has been created successfully.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //

        return view("admin.products.edit", ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, Request $request)
    {
        //
        $formFields = $request->validate([
            "name" => "required",
            "description" => "required|min:50",
            "price" => "required",
            "stockQuantity" => "required",
            "rating" => "required",
            "image" => "nullable|image"
        ]);
        //check if the image is upload
        if ($request->hasFile("cover")) {
            $formFields["image"] = $request->file("image")->store("product", "public");
        } else {
            $formFields["image"] = $product->image;
        }
        // check the role of this user
        if (Auth::user()->hasRole("admin")) {
            $product->update($formFields);
            $product->categories()->attach($request->categories);
            return redirect("/admin/dashboard")->with("success", "The Product has been updated successfully.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product, Request $request)
    {
        //
        if (Auth::user()->hasRole("admin")) {
            Storage::disk("public")->delete("$product->image");
            $product->delete();
            return redirect('/admin/dashboard')->with("success", "The Post deleted successfully. ");
        }
    }

    /**
     * get all the categories
     */
    public function getAllCategories(Request $request)
    {
        try {
            $result = [];
            $term = trim($request->q);

            if (empty($term)) {
                return response([]);
            }

            $categories = Category::search($term)->limit(5)->get();

            foreach ($categories as $category) {
                $result[] = ['id' => $category->id, 'text' => $category->name];
            }

            return response()->json($result);
        } catch (\Exception $e) {
            // Log the exception
            error_log($e);

            // Return a generic error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
