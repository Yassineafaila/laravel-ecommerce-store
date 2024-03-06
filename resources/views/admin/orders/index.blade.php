@extends('admin.layouts.layout')
@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Ordres</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the Orders in your store </p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-red-500 bg-opacity-90  ">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">Id
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                        User Name
                                    </th>

                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Total Amount</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Country</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        City</th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        state
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Postal Code
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Payment Method
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Status
                                    </th>

                                    <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                                @foreach ($orders as $order)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $order->id }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                            {{ $order->user->firstName }}
                                            {{ $order->user->lastName }}
                                        </td>>

                                        <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                            ${{ $order->totalAmount }}
                                        </td>
                                        @php
                                            $address = explode(',', $order->shipping_address);
                                        @endphp
                                        @if (count($address) > 1)
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $address[0] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $address[1] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{-- {{ $address[2] }} --}}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $address[2] }}
                                            </td>
                                        @endif
                                        <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                            {{ $order->payment_method }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                            @if ($order->status === 'paid')
                                                <span class="bg-orange-300 px-2 py-1.5 rounded">{{ $order->status }}</span>
                                            @else
                                                @if ($order->status === 'shipped')
                                                    <span
                                                        class="bg-yellow-300 px-2 py-1.5 rouned">{{ $order->status }}</span>
                                                @else
                                                    <span
                                                        class="bg-green-300 px-2 py-1.5 rounded">{{ $order->status }}</span>
                                                @endif
                                            @endif
                                        </td>

                                        <td
                                            class="relative whitespace-nowrap py-4 px-3 text-center text-sm font-medium sm:pr-6 ">
                                            <a href="/admin/dashboard/manage_orders/{{ $order->id }}/edit"
                                                class="text-red-500 me-2 hover:underline">Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
