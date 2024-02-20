@extends('layouts.layout')
@section('content')
    {{-- ---hero---- --}}
    @include('components.hero')
    <x-container class="px-4 py-4 h-full">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Latest Products</h2>
        @if (count($products) >= 1)
            <x-card-container>
                @foreach ($products as $product)
                    <x-productCard :product="$product" />
                @endforeach
            </x-card-container>
        @else
            <h1 class="text-gray-900 mt-10">There's No Products Yet :C</h1>
        @endif
    </x-container>
    {{-- ---NewsLetter-Section---- --}}
    @include('components.newsLetterSection')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".product-card").hover(function(event) {
                $(`.more-btn${$(this).data("product")}`).removeClass("hidden").addClass("flex")
            }, function(event) {
                $(`.more-btn${$(this).data("product")}`).addClass("hidden").removeClass("flex")
            })

            //handle the like product action
            $(".like-button").on("click", function() {
                let product = $(this).data("product");
                $.ajax({
                    method: "post",
                    url: `/products/${product}/like`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        // Handle success response
                        if (response.liked === true) {
                            console.log("liked successfully")
                        }
                        console.log(response);
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
            //Handle Add To Cart
            $(".addToCart-btn").on("click", function() {
                let product = $(this).data("product");
                console.log(product)
                $.ajax({
                    method: "post",
                    url: "/products/cart/add-to-cart",
                    data: {
                        product: product
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        // Handle success response
                        if (response.cart === true) {
                            console.log("added to cart successfully")
                        }
                        console.log(response);
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
                })
            })

        })
    </script>
@endsection
