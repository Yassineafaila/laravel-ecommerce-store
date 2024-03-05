@extends('layouts.layout')
@section('content')
    <div style="background: #eee" class="h-fit px-2">
        <div class="container mx-auto max-w-[1200px]">
            <div class="my-4 bg-white py-2 px-4">
                <h2 class="text-gray-800 font-bold text-2xl">Orders Sammuray :</h2>
            </div>
            <div class="container mx-auto">
                @foreach ($orders as $order)
                    <div class="bg-white px-6 py-4 my-3">
                        {{-- //small-details --}}
                        <div class=" border-b border-gray-400 flex items-center justify-between">
                            <h3 class="text-black capitalize font-bold">{{ $order->status }}</h3>
                            <div class="flex items-center gap-2 pb-2">
                                @php
                                    $orderDate = date_format($order->created_at, 'D ,M Y');
                                @endphp
                                <p class="flex flex-col text-sm font-medium">
                                    <span>Order date : {{ $orderDate }}</span>
                                    <span>Order ID : {{ $order->id }}</span>
                                </p>
                                <a href="/products/order-summary/{{ $order->id }}/order-details"
                                    class="font-bold text-md border-l-2 px-2 flex items-center gap-2 hover:text-red-500 hover:underline">Order
                                    details
                                    <i class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                        {{-- //order-items --}}
                        @foreach ($order->orderItems as $orderItem)
                            <div class="py-4 flex gap-3">
                                @php
                                    $subString = 'images';
                                @endphp
                                <img src="{{ strpos($orderItem->product->image, $subString) === 0 ? asset($orderItem->product->image) : asset('storage/' . $orderItem->product->image) }}"
                                    class="w-44 " />
                                <div class="flex flex-col font-medium">
                                    <span>{{ $orderItem->product->name }}</span>
                                    <span class="font-bold">${{ $orderItem->product->price }} x
                                        <span>{{ $orderItem->quantity }}</span></span>
                                </div>
                            </div>
                        @endforeach

                        @if ($order->status === 'pending')
                            <div class=" border-t border-gray-400 flex items-center justify-between">
                                <form method="post" action="/products/order-summary">
                                    @csrf
                                    @method("delete")
                                    <input type="hidden" name="order" value="{{ $order->id }}" />
                                    <button type="submit"
                                        class="bg-red-500 text-white py-2 px-4 mt-2 rounded hover:bg-red-800 font-medium">Cancel
                                        Order</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
