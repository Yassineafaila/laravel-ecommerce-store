@extends('layouts.layout')

@section('content')
    {{-- ---hero---- --}}
    @include('components.hero')
    <section class="px-4 mt-4 py-4 ">
        <div class="container mx-auto flex items-center justify-center">
            <h2 class="md:text-2xl py-4 self-start">Latest Products</h2>
        </div>
        <div
            class="container mx-auto grid gap-5 md:gap-4 lg:gap-5 xl:gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach ($products as $product)
                <div class="product-card pb-1.5 relative rounded-md border md:shadow-md lg:shadow-lg xl:shadow-xl "
                    id="{{ $product->id }}">
                    <div class="img-container overflow-hidden relative ">
                        {{-- <img src="{{ asset("$product->image") }}" class="product-image hover:scale-110 duration-300" /> --}}
                        @php
                            $subString = 'images';
                        @endphp
                        <img src="{{ strpos($product->image, $subString) === 0 ? asset("$product->image") : asset('storage/' . $product->image) }}"
                            class="h-64 w-full" />
                    </div>

                    <div class="product-info px-3 py-2  ">
                        <div class="flex items-center justify-between my-2.5">
                            <span class=" font-semibold text-md md:text-lg ">{{ $product->name }}</span>
                            <span
                                class="bg-yellow-400 text-red-500 rounded-md font-medium px-2">${{ $product->price }}</span>
                        </div>
                        <div class="my-1.5">
                            @if (is_int($product->rating))
                                @for ($i = 0; $i < $product->rating; $i++)
                                    <span><i class="fa-solid fa-star text-yellow-400"></i></span>
                                @endfor
                            @else
                                @for ($i = 0; $i < (int) $product->rating; $i++)
                                    <span><i class="fa-solid fa-star text-yellow-400"></i></span>
                                @endfor
                                <span><i class="fa-solid fa-star-half-stroke text-yellow-400"></i></span>
                            @endif

                        </div>


                    </div>
                    <div class="flex items-center justify-between px-3 py-2">
                        <form method="POST">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-800 duration-300 text-white font-meduim py-1.5 px-3 rounded-sm md:rounded-md lg:rounded-md xl:rounded-md"><span
                                    class="me-2"><i class="fa-solid fa-cart-shopping"></i></span>Add
                                To Cart </button>
                        </form>

                        <button type="submit"
                            class=" like-button absolute  top-5 right-5 bg-white px-2 py-1 w-8 h-8 rounded-full flex items-center justify-center z-50"
                            data-product="{{ $product->id }}">
                            <i class="fa-regular fa-heart text-red-500"></i>
                        </button>

                    </div>

                    <div>
                        <a href="/products/{{ $product->name }}"
                            class="more-btn{{ $product->id }} bg-red-500 item-center justify-center z-50 text-white py-1.5 px-3 rounded-sm md:rounded-md lg:rounded-md xl:rounded-md w-28  absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 hidden">More
                            Info</a>
                        <div
                            class="overlay absolute top-0 left-0 h-full w-full rounded-md  hover:bg-black hover:bg-opacity-40 duration-300 ">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".product-card").hover(function(event) {
                $(`.more-btn${event.currentTarget.id}`).removeClass("hidden").addClass("flex")
            }, function(event) {

                $(`.more-btn${event.currentTarget.id}`).addClass("hidden").removeClass("flex")

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

        })
    </script>
@endsection
