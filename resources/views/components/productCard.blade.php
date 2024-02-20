@props(['product'])
<div class="product-card group relative" data-product="{{ $product->id }}">
    <div
        class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
        @php
            $subString = 'images';
        @endphp
        <img src="{{ strpos($product->image, $subString) === 0 ? asset("$product->image") : asset('storage/' . $product->image) }}"
            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm text-gray-700">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $product->name }}
                </a>
            </h3>
            {{-- rating-component --}}
            <x-rating :rating="$product->rating" />
        </div>
        <p class="text-sm font-medium text-gray-900">${{ $product->price }}</p>

    </div>
    <div class="py-2 absolute top-0 right-3 flex items-center gap-3">
        <button type="button" data-product="{{ $product->id }}"
            class="addToCart-btn bg-white px-2 py-1 w-8 h-8 rounded-full flex items-center justify-center z-50"><i
                class="fa-solid fa-cart-shopping text-red-500"></i></button>
        <button type="button"
            class=" like-button  bg-white px-2 py-1 w-8 h-8 rounded-full flex items-center justify-center z-50"
            data-product="{{ $product->id }}"> <i class="fa-regular fa-heart  text-red-500"></i>
        </button>
    </div>
    <a href="/products/{{ $product->name }}"
        class="more-btn{{ $product->id }} bg-red-500 text-sm item-center justify-center z-50 text-white py-1.5 px-3 rounded-sm md:rounded-md lg:rounded-md xl:rounded-md w-28  absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 hidden">More
        Info</a>
</div>
