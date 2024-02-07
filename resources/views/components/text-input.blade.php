@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border hover:border-red-500 focus:border-red-500 outline-none px-2.5 rounded-md shadow-sm ',
    'placeholder' => '',
]) !!}>
