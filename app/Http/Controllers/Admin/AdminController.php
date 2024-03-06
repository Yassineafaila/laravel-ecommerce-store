<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index()
    {
        $totalOrders = Order::all()->count();
        $totalPendingOrders = Order::where("status", "pending")->count();
        $totalSales = Payment::all()->sum("amount");
        //calc the total sales
        $totalProducts = Product::all()->count();
        return view(
            "admin.home.index",
            [
                "orders" => $totalOrders,
                "pendingOrders" => $totalPendingOrders,
                "sales" => $totalSales,
                "products" => $totalProducts
            ]
        );
    }
}
