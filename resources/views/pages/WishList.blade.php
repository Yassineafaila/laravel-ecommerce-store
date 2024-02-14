@extends('layouts.layout')
@section('content')
    <div class="w-full max-w-[1200px] mx-auto mt-6">
        <div>
            <h1 class="text-gray-900 md:text-2xl">Product You Liked ({{ count($products) }})</h1>
        </div>
        @if (count($products) >= 1)
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-red-500 bg-opacity-90  ">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                            Id
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                            Image
                                        </th>

                                        <th scope="col"
                                            class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                            Name</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                            Description</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                            Price</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                            Stock Quantity
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                            Rating
                                        </th>

                                        <th scope="col"
                                            class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">

                                    @foreach ($products as $product)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $product->id }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                @php
                                                    $subString = 'images';
                                                @endphp
                                                <img src="{{ strpos($product->image, $subString) === 0 ? asset("$product->image") : asset('storage/' . $product->image) }}"
                                                    class="mx-auto w-10 h-10" />
                                            </td>>

                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $product->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $product->description }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                ${{ $product->price }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $product->stockQuantity }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-gray-500">
                                                {{ $product->rating }}
                                            </td>

                                            <td
                                                class="relative whitespace-nowrap py-4 px-3 text-center text-sm font-medium sm:pr-6 ">
                                                <button type="button" class="unliked-btn text-center text-red-500 "
                                                    data-product="{{ $product->id }}">Unliked</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="mx-auto container  w-full max-w-full flex items-center justify-center">
                <h1 class="">There's no Liked Products :C</h1>
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            //handle the unlike product action
            $(".unliked-btn").on("click", function() {
                let product = $(this).data("product");
                $.ajax({
                    method: "post",
                    url: `/products/${product}/unfavorite`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        // Handle success response
                        if (response.liked === fasle) {
                            // Reload the page
                            window.location.reload(true);
                        } else {
                            // console.error(xhr.responseText);
                            return null
                        }

                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        if (xhr.status === 401) {
                            // User is unauthenticated, redirect to login page
                            window.location.href = '/login';
                        } else {
                            // console.error(xhr.responseText);
                            return null
                        }
                    }
                });
            });

        })
    </script>
@endsection
