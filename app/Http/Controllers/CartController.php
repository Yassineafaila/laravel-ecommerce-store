<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //show the Cart
    public function  index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        return view('carts.cart', compact('cartItems'));
    }

    //Add To Cart
    public function store(Request $request)
    {
        // dd($request);
        if (auth()->check()) {
            // User is authenticated, store cart data in the database
            $user = auth()->user();
            $productId = $request->product;
            $quantity = $request->quantity ? $request->quantity : 1;
            $productExists = Cart::where([["product_id", $productId], ["user_id", $user->id]])->exists();
            if ($productExists) {
                return response()->json(["message" => "Product Already Exists in The Cart"]);
            }
            Cart::create([
                "user_id" => $user->id,
                "product_id" => $productId,
                "Quantity" => $quantity,
            ]);
            return response()->json(['message' => 'Product added successfully to your cart', 'cart' => false], 200);
        } else {
            // If user is not authenticated, return a response indicating the user needs to authenticate
            return response()->json(['error' => 'User not authenticated', 'message' => 'Please log in to add products to your cart'], 401);
        }
    }

    //Calc the subTotal
    public function calcSubTotal(Request $request)
    {
        $productId = $request->product;
        $quantity = $request->quantity;
        $productQuantity = Product::query()->where("id", $productId)->pluck("stockQuantity")->all();
        $productPrice = Product::query()->where("id", $productId)->pluck("price")->all();
        if (auth()->check()) {
            // User is authenticated, store cart data in the database
            $userId = auth()->user()->id;
            if ($productQuantity[0] > 0) {
                //change the quantity in the Cart Table
                Cart::where([["user_id", $userId], ["product_id", $productId]])->update([
                    "Quantity" => $quantity,
                ]);
                $subTotal = round($productPrice[0] * $quantity, 2);
                return response()->json(['subTotal' => $subTotal], 200);
            } else {
                return response()->json(['message' => 'product quantity not enough ', 'subTotal' => 0], 200);
            }
        } else {
            // If user is not authenticated, return a response indicating the user needs to authenticate
            return response()->json(['error' => 'User not authenticated', 'message' => 'Please log in to add products to your cart'], 401);
        }
    }
    //Delete The Product From Shopping Cart :
    public function delete(Request $request)
    {
        $product = Cart::where("product_id", "=", $request->productId)->delete();
        // dd($product);
        if ($product) {
            return view("carts.cart", ["cartItems" => Cart::all()]);
        }
        return response()->json(["message" => "error while trying to remove the product"], 401);
    }
}
