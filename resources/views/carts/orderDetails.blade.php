@extends('layouts.layout')
@section('content')
    <div style="background: #eee" class="h-fit mb-2">
        <div class="container mx-auto max-w-[1200px] h-full">
            <div class="mt-4 bg-white py-2 px-2">
                <a href="/" class="hover:text-red-500">Home <i class="fa-solid fa-angle-right"></i></a>
                <a href="/products/order-summary" class="hover:text-red-500">My Orders <i
                        class="fa-solid fa-angle-right"></i></a>
                <a href="#" class="hover:text-red-500">My Orders </a>

            </div>
            <div class="my-4 bg-white py-2 px-2">
                <h2 class="text-gray-800 font-bold text-2xl">Orders Details :</h2>
            </div>
            <div>
                {{-- //about the order  --}}
                <div class="px-2 py-1.5 bg-white mt-2">
                    <h5 class="text-lg font-bold">Order :</h5>
                    <div class="flex flex-col gap-2 mt-2">
                        <p class="text-sm font-medium ">Order number : <span> {{ $orderDetails->id }}</span></p>
                        @php
                            $dateOfOrder = date_format($orderDetails->created_at, 'D,M Y');
                        @endphp
                        <p class="text-sm font-medium ">Order date : <span>{{ $dateOfOrder }}</span></p>
                        <p class="text-sm font-medium ">Order Tax : <span>{{ $orderDetails->tax }}</span></p>
                        <p class="text-sm font-medium ">Order Total Amount :
                            <span>${{ $orderDetails->totalAmount }}</span>
                        </p>
                        <p class="text-sm font-medium ">Order Status : {{ $orderDetails->status }}</p>
                    </div>
                </div>
                {{-- // about the shipping --}}
                <div class="px-2 py-1.5 bg-white mt-2">
                    <h5 class="text-lg font-bold">Shipping :</h5>
                    <div class="flex flex-col gap-2 mt-2">
                        @php
                            $address = explode(',', $orderDetails->shipping_address);
                        @endphp
                        <p class="flex flex-col gap-1 text-sm font-medium">
                            Shipping Address :
                            @if (count($address) > 1)
                                <span>Country :{{ $address[0] }}</span>
                                <span>City :{{ $address[1] }}</span>
                                <span>Postal Code :{{ $address[2] }}</span>
                            @endif

                        </p>
                        <p class="text-sm font-medium ">Shipping mehtod : {{ $orderDetails->shipping_method }}</p>
                        <p class="text-sm font-medium ">Shipping Cost : ${{ $orderDetails->shipping_cost }}</p>
                    </div>
                </div>
                {{-- // about the payment --}}
                <div class="px-2 py-1.5 bg-white mt-2">
                    <h5 class="text-lg font-bold">Payment :</h5>
                    <div class="flex flex-col gap-2 mt-2">
                        <p class="text-sm font-medium ">Payment Method :
                            <span>{{ $orderDetails->payment_method }}</span>
                        </p>
                    </div>
                </div>
                {{-- //order-items --}}
                <div class="px-2 py-1.5 bg-white mt-2">
                    <h5 class="text-lg font-bold">Order Items :</h5>
                    @foreach ($orderDetails->orderItems as $orderItem)
                        <div class="py-4 flex gap-3 bg-white mt-4">
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
                </div>

            </div>
        </div>

    </div>
@endsection
