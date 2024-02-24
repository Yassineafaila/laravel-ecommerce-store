<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //Show The Checkout Page
    public function index(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        return view("carts.checkoutForm", ["cartItems" => $cartItems, "subTotal"=>$request->subTotal,"Total"=>$request->total]);
    }
}
