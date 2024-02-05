@extends('layouts.layout')
@section('content')
    <section class="px-4 mt-3">
        @if (isset($error))
            <div class="container mx-auto flex items-center justify-center h-full">
                <p class="text-base">{{ $error }} :C</p>
            </div>
        @else
            <div class="container mx-auto  ">
                <div class="header-info flex items-center justify-between mb-5 w-full">
                    <div>
                        <a href="/" class="block  rounded-full px-2.5 py-1.5 md:py-1.5 border-2"> <i
                                class="fa-solid fa-arrow-left-long"></i>
                            <span class="text-red-500">Back</span></a>
                    </div>
                    <div class="flex items-center gap-5 md:gap-4">
                        <button><span class="hidden md:inline-block text-gray-500 ">Share </span><i
                                class="fa-solid fa-share-nodes text-red-500 ms-1.5 border rounded-full px-2 py-2 hover:bg-red-500 hover:text-white duration-300"></i></button>
                        <button><span class="hidden md:inline-block text-gray-500 ">Add my favorites</span>
                            <i
                                class="fa-regular fa-heart text-red-500 ms-1.5 border rounded-full px-2 py-2 hover:bg-red-500 hover:text-white duration-300"></i></button>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center  justify-between gap-4">
                    <div class="img-container w-full lg:basis-full">
                        <img src="{{ asset("$product->image") }}" alt="image of the product" class="block"
                            class="w-full" />
                    </div>
                    <div>
                        <div class="mb-4">
                            @foreach ($product->categories as $category)
                                <span
                                    class="bg-dark inline-block text-white rounded-full px-2.5 py-1 md:px-3.5 md:py-1.5">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        <div>
                            <h4 class="text-2xl md:text-4xl font-bold">{{ $product->name }}</h4>
                            <p class="my-2 text-gray-800 font-medium">{{ $product->description }}</p>
                            <p class="my-2 text-gray-400 font-normal leading-normal">Lorem ipsum dolor sit amet,
                                consectetur
                                adipiscing
                                elit. Ut pharetra sapien
                                eget erat
                                efficitur, quis aliquet metus vulputate. Nullam eu turpis porttitor, gravida massa sed,
                                egestas metus. Nulla id nisl urna. Phasellus a metus ac erat suscipit fringilla vel ac nibh.
                                Nunc massa magna, scelerisque et diam at, pellentesque ultrices urna. Phasellus eleifend
                                vehicula arcu, eget commodo tellus molestie ac. Maecenas a risus in mi imperdiet dapibus.
                            </p>
                            <h3>Price : <span class="ms-1 text-xl">${{ $product->price }}</span></h3>
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
                            <div>
                                <p class="text-dark text-base font-bold inline-block mb-3">Stock Quantity :
                                    <span class="text-red-500">{{ $product->stockQuantity }}</span>
                                </p>
                                <form method="post">
                                    <form method="post">
                                        <button type="button"
                                            class="decrease-btn bg-red-500 border border-red-500 text-white py-1.5 px-2 "><i
                                                class="fa-solid fa-minus"></i></button>
                                        <input type="number" class="border py-1.5 px-2.5 w-60 input-quantity"
                                            max="{{ $product->stockQuantity }}" min="0" name="quantity" />
                                        <button type="button" id="{{ $product->id }}"
                                            class="increase-btn bg-red-500 border border-red-500 text-white py-1.5 px-2 "><i
                                                class="fa-solid fa-plus"></i></button>
                                    </form>
                                    <p class="text-red-500 warning">{{ session('failed') }}</p>
                                    <button type="submit"
                                        class="bg-red-500 px-3 w-full md:w-80 md:py-2 hover:bg-red-800 duration-300 py-1.5 my-4 text-white font-semibold rounded-md">Add
                                        To
                                        Cart <i class="fa-solid fa-cart-shopping"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- --reviews---- --}}
                <div class="container mx-auto mt-4">
                    <h3 class="border-l-4 border-red-500 px-2.5 mb-4">Reviews ({{ count($product->reviews) }})</h3>
                    @foreach ($product->reviews as $review)
                        <div class="border border-gray-400 rounded shadow flex flex-col gap-5 max-w-96 py-3 px-3">
                            <div class="flex  items-center justify-between">
                                <div class="flex items-center gap-3 md:gap-3">
                                    <img class="w-10 md:block h-10 rounded-full border border-yellow-500"
                                        src="{{ $review->user->avatar ? asset('storage/' . $review->user->avatar) : asset('/images/no-image.jpg') }}"
                                        alt="user-profile" />
                                    <div class="flex items-center flex-col">
                                        <span
                                            class="font-bold">{{ $review->user->firstName }}{{ $review->user->lastName }}</span>
                                        <div class="">
                                            @if (is_int($review->rating))
                                                @for ($i = 0; $i < $product->rating; $i++)
                                                    <span><i
                                                            class="fa-solid fa-star text-yellow-400 text-xs md:text-sm"></i></span>
                                                @endfor
                                            @else
                                                @for ($i = 0; $i < (int) $product->rating; $i++)
                                                    <span><i
                                                            class="fa-solid fa-star text-yellow-400 text-xs md:text-sm"></i></span>
                                                @endfor
                                                <span><i
                                                        class="fa-solid fa-star-half-stroke text-yellow-400 text-xs md:text-sm"></i></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $date = Carbon\Carbon::parse($review->created_at);
                                    $elapsed = $date->diffForHumans();
                                @endphp
                                <span class="text-gray-400 text-sm md:text-base">{{ $elapsed }}</span>
                            </div>
                            <div>
                                <p class="text-gray-800 text-sm md:text-base">{{ $review->comment }}</p>
                            </div>
                        </div>

                </div>
        @endforeach
        </div>
        </div>
        @endif
    </section>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            let initialQuantity = 0;
            $(".input-quantity").val(initialQuantity)
            $(".increase-btn").on("click", function() {
                $(".input-quantity").val(initialQuantity++)
            })
            $(".decrease-btn").on("click", function() {
                if ($(".input-quantity").val() == 0) {
                    $(".decrease-btn").attr("disabled")
                } else {
                    $(".input-quantity").val(initialQuantity--)
                }
            })
        })
    </script>
@endsection
