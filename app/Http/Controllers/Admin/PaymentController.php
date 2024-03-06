<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    //show all the payments:
    public function index(){
        $payments = Payment::all();
        return view("admin.payments.index", ["payments" => $payments]);
    }
}
