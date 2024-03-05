<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    //Show The Checkout Page
    public function index(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        return view("carts.checkoutForm", ["cartItems" => $cartItems, "subTotal" => $request->subTotal, "Total" => $request->total]);
    }

    //Confirm Order
    public function store(Request $request)
    {

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $formFields = $request->validate([
            "email" => "required",
            "firstName" => "required",
            "lastName" => "required",
            "city" => "required",
            "country" => "required",
            "region" => "required",
            "postalCode" => "required",
            "phone" => "required",
        ]);

        //Add The Order
        $order = Order::create([
            "user_id" => $user->id,
            "totalAmount" => (float) $request->total,
            "tax" => (float) $request->tax,
            "shipping_cost" => $request->shipping,
            "shipping_method" => "",
            "payment_method" => "",
            "shipping_address" => "",
            "status" => "pending",
        ]);
        if ($order) {

            foreach ($cartItems as $item) {
                // Attach the product to the order with quantity
                OrderItems::create([
                    "order_id" => $order->id,
                    "product_id" => $item->product_id,
                    "quantity" => $item->Quantity,
                    "subTotal" => $item->Quantity * $item->product->price
                ]);
            }
        }


        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        $stripe = new \Stripe\StripeClient(config("stripe.stripe_sk"));

        $response = [
            'shipping_address_collection' => ['allowed_countries' => [
                'AU', 'AT', 'BE', 'BG', 'CA', 'CL', 'CO', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HK',
                'HU', 'IS', 'ID', 'IE', 'IT', 'JP', 'LV', 'LT', 'LU', 'MY', 'MT', 'MX', 'NL', 'NZ', 'NO', 'PL', 'PT',
                'RO', 'SA', 'SG', 'SK', 'SI', 'ZA', 'KR', 'ES', 'SE', 'CH', 'TH', 'TR', 'AE', 'GB', 'US', 'VN'
            ]],
            'shipping_options' => [
                [
                    'shipping_rate_data' => [
                        'type' => 'fixed_amount',
                        'fixed_amount' => [
                            'amount' => 0,
                            'currency' => 'usd',
                        ],
                        'display_name' => 'Free shipping',
                        'delivery_estimate' => [
                            'minimum' => [
                                'unit' => 'business_day',
                                'value' => 15,
                            ],
                            'maximum' => [
                                'unit' => 'business_day',
                                'value' => 20,
                            ],
                        ],
                    ],
                ],
                [
                    'shipping_rate_data' => [
                        'type' => 'fixed_amount',
                        'fixed_amount' => [
                            'amount' => 1500,
                            'currency' => 'usd',
                        ],
                        'display_name' => 'Next day air',
                        'delivery_estimate' => [
                            'minimum' => [
                                'unit' => 'business_day',
                                'value' => 3,
                            ],
                            'maximum' => [
                                'unit' => 'business_day',
                                'value' => 6,
                            ],
                        ],
                    ],
                ],
            ],
            'line_items' => [],
            'automatic_tax' => ['enabled' => false],
            'mode' => 'payment',
            'success_url' => route("success") . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route("cancel")
        ];

        foreach ($cartItems as $item) {
            $lineItem = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->product->name,
                        // You can add more product data here if needed
                    ],
                    'unit_amount' => (int) ($item->product->price * 100) + (int)$request->tax, // Assuming the price is in dollars
                ],
                'quantity' => $item->Quantity,
            ];

            $response['line_items'][] = $lineItem;
        }

        $response = $stripe->checkout->sessions->create($response);
        if (isset($response->id) && $response->id !== "") {

            session()->put('order_id', $order->id);
            return redirect($response->url);
        } else {
            return redirect()->route("cancel");
        }
    }

    public function success(Request $request)
    {
        $user = Auth::user();

        if (isset($request->session_id)) {
            $stripe = new \Stripe\StripeClient(config("stripe.stripe_sk"));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->amount = $response->amount_total / 100;
            $payment->currency = $response->currency;
            $payment->user_name = $response->customer_details->name;
            $payment->user_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $res = $payment->save();
            if ($res) {
                $order = Order::where([
                    ["user_id", $user->id],
                    ["id", session()->get("order_id")]
                ])->first();
                $order->payment_method = "Stripe";
                if ($response->shipping_cost->amount_total == 0) {
                    $order->shipping_method = "Free";
                } else {
                    $order->shipping_method = "business";
                    $order->shipping_cost = $response->shipping_cost->amount_total / 100;
                }
                $order->shipping_address = $response->shipping_details->address->country . "," . $response->shipping_details->address->city . "," . $response->shipping_details->address->postal_code;
                $order->update();
                // Delete cart items associated with the user
                $cartItems = Cart::where('user_id', $user->id)->get();
                foreach ($cartItems as $cartItem) {
                    $cartItem->delete();
                }

                // Update order status
                $order->status = "paid";
                $order->update();
            }


            return redirect("/");
        } else {
            return redirect()->route("cancel");
        }
    }

    public function cancel()
    {
        return "Payment is canceled";
    }

    //get all the orders for a specific user :
    public function getAllTheOrders()
    {
        $orders = Order::all()->where("user_id", auth()->user()->id);
        return view("carts.orderSummary", ["orders" => $orders]);
    }
    public function getAllOrderDetails(Order $order)
    {
        return view("carts.orderDetails", ["orderDetails" => $order]);
    }
    //cancel the order
    public function cancelOrder(Request $request)
    {
        $order = Order::where("id", $request->order)->first();
        $order->delete();

        $orders = Order::all()->where("user_id", auth()->user()->id);
        return view("carts.orderSummary", ["orders" => $orders]);
    }
}
