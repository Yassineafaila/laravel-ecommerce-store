<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

            // Store cart data in the database
            // Cart::updateOrCreate([
            //     'user_id' => $user->id,
            //     'product_id' => $productId,
            // ], [
            //     'quantity' => DB::raw('quantity + ' . $quantity),
            // ]);
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
}
