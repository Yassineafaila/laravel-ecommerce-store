<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //show all the orders
    public function index(){
        $orders = Order::orderBy("created_at")->get();
        return view("admin.orders.index", ["orders" => $orders]);
    }
}
