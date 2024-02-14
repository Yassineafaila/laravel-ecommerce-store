@props(['rating'])
<div class="my-1.5">

    @if (is_int($rating))
        @for ($i = 0; $i < $rating; $i++)
            <span><i class="fa-solid fa-star text-yellow-400"></i></span>
        @endfor
    @else
        @for ($i = 0; $i < (int) $rating; $i++)
            <span><i class="fa-solid fa-star text-yellow-400"></i></span>
        @endfor
        <span><i class="fa-solid fa-star-half-stroke text-yellow-400"></i></span>
    @endif
    <span class="text-gray-400">({{ $rating }})</span>
</div>
