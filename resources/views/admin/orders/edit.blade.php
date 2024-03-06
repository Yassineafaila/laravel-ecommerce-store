@extends('admin.layouts.layout')
@section('content')
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <h2 class="mt-4 text-center text-3xl font-bold tracking-tight text-gray-900">Edit Ther Order</h2>
                </div>
                {{-- //form  --}}
                <form class="space-y-6" action="/admin/dashboard/manage_orders/{{ $order->id }}/edit" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <label for="orderId" class="block text-sm font-medium text-gray-700">Order Id</label>
                        <div class="mt-1">
                            <input id="orderId" name="orderId" type="text" required readonly
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{ $order->id }}">
                            @error('orderId')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 mb-2">
                        <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <div class="mt-1">
                            <input id="fullName" name="fullName" type="text" required readonly
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{ $order->user->firstName }} {{ $order->user->lastName }}">
                            @error('fullName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <label for="totalAmount" class="block text-sm font-medium text-gray-700">Total Amount</label>
                        <div class="mt-1">
                            <input id="totalAmount" name="totalAmount" type="text" required readonly
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm"
                                value="{{ $order->totalAmount }}">
                            @error('totalAmount')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4 mb-2">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" value="{{ $order->status }}"
                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border focus:border-red-500 focus:outline focus:outline-red-500 sm:text-sm">

                            <optgroup>
                                <option value="paid">Paid</option>
                                <option value="shipped">shipped</option>
                                <option value="delivered">delivered</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4 flex gap-3">
                        <button type="submit"
                            class="flex  justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none ">update
                        </button>
                        <button type="button">
                            <a href="/admin/dashboard/manage_products" class="hover:underline">Cancel</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
