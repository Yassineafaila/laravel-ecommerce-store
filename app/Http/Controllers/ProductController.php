<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //Show All the Products
    public function index(Request $request)
    {

        $products = Product::latest()->filter(request(["category", "search"]))->paginate();

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
    //get the liked Products
    public function getLikedProducts()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();
        // Get all the liked products of the authenticated user
        $likedProducts = $user->likedProducts;
        return view("pages.WishList", ["products" => $likedProducts]);
    }
    // handle the unliked  action for a product
    public function unLikedProduct(Product $product, Request $request)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check if the user has already liked the product
            $existingLike = UserProduct::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();

            if ($existingLike) {
                // If the user has liked the product, remove the relationship
                $existingLike->delete();

                // Decrement the number of likes for the product if needed
                $product->numberOfLikes--;
                $product->save();

                return response()->json(['message' => 'Product unliked successfully', 'liked' => false], 200);
            } else {
                // If the user has not liked the product, return a response indicating that
                return response()->json(['error' => 'You have not liked this product previously', 'liked' => false], 400);
            }
        } else {
            // If user is not authenticated, return a response indicating the user needs to authenticate
            return response()->json(['error' => 'User not authenticated', 'message' => 'Please log in to unlike products'], 401);
        }

    }

    //handle the liked action for a product
    public function likeProduct(Product $product, Request $request)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check if the user has already liked the product
            $existingLike = UserProduct::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->exists();

            if (!$existingLike) {
                // If the user has not liked the product already, insert the relationship
                UserProduct::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);

                // Increment the number of likes for the product if needed
                $product->numberOfLikes++;
                $product->save();

                return response()->json(['message' => 'Product liked successfully',"liked"=>true], 200);
            } else {
                // If the user has already liked the product, return a response indicating that
                return response()->json(['error' => 'User has already liked this product',"liked"=>true], 400);
            }
        } else {
            // If user is not authenticated, return a response indicating the user needs to authenticate
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
}
