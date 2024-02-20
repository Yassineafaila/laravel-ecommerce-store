<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //Show The Checkout Page
    public function index(Request $request)
    {
        
        // Accessing inputs from the form
        $subTotal = $request->input('subTotal');
        $shipping = $request->input('shipping');
        $tax = $request->input('tax');
        $total = $request->input('total');

        return view("carts.checkoutForm");
    }
}
