@extends('admin.layouts.layout')
@section('content')
    <div class="px-4 py-4 bg-gray-50">
        <div class="flex flex-col gap-1">
            <h3 class="text-3xl my-0">Dashboard</h3>
            <p class="text-sm">Welcome To Your Dashboard</p>
        </div>
        {{-- ///Stats --}}
        <div class="flex justify-between w-full mt-4 lg:gap-4">
            {{-- //total orders --}}
            <div class="bg-white p-4 shadow rounded flex items-center gap-3">
                <p class="text-xl font-bold my-4 bg-green-500 p-3 rounded-full bg-opacity-15">
                    <i
                        class="fa-solid fa-cart-shopping text-sm bg-green-500 text-white h-10 w-10 flex items-center justify-center rounded-full"></i>
                </p>
                <p class="flex flex-col gap-1">
                    <span class="text-gray-400 text-sm">Orders recieved</span>
                    <span class="font-bold text-xl">{{ $orders }}</span>
                </p>
            </div>
            {{-- //pending orders  --}}
            <div class="bg-white p-4 shadow rounded flex items-center gap-3">
                <p class="text-xl font-bold my-4 bg-indigo-500 bg-opacity-15 p-3 rounded-full ">
                    <i
                        class="fa-solid fa-cart-plus text-sm bg-indigo-500 text-white h-10 w-10 flex items-center justify-center rounded-full"></i>
                </p>
                <p class="flex flex-col">
                    <span class="text-gray-400 text-sm">Pending Orders</span>
                    <span class="font-bold text-xl">{{ $pendingOrders }}</span>
                </p>
            </div>
            {{-- //total products  --}}
            <div class="bg-white p-4 shadow rounded flex items-center gap-3">
                <p class="text-xl font-bold my-4  bg-blue-500 bg-opacity-15 p-3 rounded-full "><i
                        class="fa-solid fa-bag-shopping text-sm bg-blue-500 text-white h-10 w-10 flex items-center justify-center rounded-full"></i>
                </p>
                <p class="flex flex-col gap-1">
                    <span class="text-gray-400 text-sm">Total Products</span>
                    <span class="font-bold text-xl">{{ $products }}</span>
                </p>
            </div>
            {{-- //total sales --}}
            <div class="bg-white p-4 shadow rounded flex items-center gap-3">
                <p class="text-xl font-bold my-4  bg-orange-500 bg-opacity-15 p-3 rounded-full ">
                    <i
                        class="fa-solid fa-dollar-sign text-sm bg-orange-500 text-white h-10 w-10 flex items-center justify-center rounded-full">
                    </i>
                </p>
                <p class="flex flex-col gap-1">
                    <span class="text-gray-400 text-sm">Total Sales</span>
                    <span class="font-bold text-xl">$ {{ $sales }}</span>
                </p>

            </div>
        </div>
    </div>
@endsection
