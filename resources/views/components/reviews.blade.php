@props(['reviews'])
<div class="bg-white">
    <div class=" max-w-2xl py-8 px-4 sm:py-8  lg:max-w-7xl">
        <h2 class="text-lg font-medium text-gray-900">Recent reviews ({{ count($reviews) }})</h2>
        <div class="mt-3 space-y-10 divide-y divide-gray-200 border-t border-b border-gray-200 pb-10">
            @foreach ($reviews as $review)
                <div class="pt-2 lg:grid lg:grid-cols-12 lg:gap-x-8">
                    <div
                        class="lg:col-span-8 lg:col-start-5 xl:col-span-9 xl:col-start-4 xl:grid xl:grid-cols-3 xl:items-start xl:gap-x-8">
                        <div class="flex items-center xl:col-span-1">
                            <div class="flex items-center gap-3">
                                @if (is_int($review->rating))
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span><i class="fa-solid fa-star text-yellow-400 text-xs md:text-sm"></i></span>
                                    @endfor
                                @else
                                    @for ($i = 0; $i < (int) $review->rating; $i++)
                                        <span><i class="fa-solid fa-star text-yellow-400 text-xs md:text-sm"></i></span>
                                    @endfor
                                    <span><i
                                            class="fa-solid fa-star-half-stroke text-yellow-400 text-xs md:text-sm"></i></span>
                                @endif
                            </div>
                            <p class="ml-3 text-sm text-gray-700">5<span class="sr-only">{{ $review->rating }}</span>
                            </p>
                        </div>

                        <div class="mt-4 lg:mt-6 xl:col-span-2 xl:mt-0">
                            <h3 class="text-sm font-medium text-gray-900">{{ $review->comment }}</h3>

                            <div class="mt-3 space-y-6 text-sm text-gray-500">
                                <p>I was really pleased with the overall shopping experience. My order even included a
                                    little personal, handwritten note, which delighted me!</p>
                                <p>The product quality is amazing, it looks and feel even better than I had anticipated.
                                    Brilliant stuff! I would gladly recommend this store to my friends. And, now that I
                                    think of it... I actually have, many times!</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-6 flex items-center text-sm lg:col-span-4 lg:col-start-1 lg:row-start-1 lg:mt-0 lg:flex-col lg:items-start xl:col-span-3">
                        <p class="font-medium text-gray-900">{{ $review->user->firstName }}{{ $review->user->lastName }}
                        </p>
                        @php
                            $date = date_format($review->created_at, 'Y,M d');
                        @endphp
                        <time datetime="2021-01-06"
                            class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:ml-0 lg:mt-2 lg:border-0 lg:pl-0">{{ $date }}</time>
                    </div>
                </div>
            @endforeach

            <!-- More reviews... -->
        </div>

    </div>
</div>
