<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //show all the orders
    public function index()
    {
        $orders = Order::orderBy("created_at")->get();
        return view("admin.orders.index", ["orders" => $orders]);
    }
    //show edit page to update the order
    public function edit(Order $order)
    {
        return view("admin.orders.edit", ["order" => $order]);
    }

    //update the order
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect("/admin/dashboard");
    }
}
