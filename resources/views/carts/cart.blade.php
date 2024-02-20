@extends('layouts.layout')
@section('content')
    {{-- <div>{{ $cartItems[0]->user }}</div> --}}
    <div class="bg-white">
        <div class="mx-auto container max-w-[1200px] py-3 px-4 sm:py-10 sm:px-6 lg:px-5">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Shopping Cart</h1>
            
            <form class="mt-12">
                <div>
                    <h2 class="sr-only text-black">Items in your shopping cart</h2>

                    <ul role="list" class="divide-y divide-gray-200 border-t border-b border-gray-200">
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-03.jpg"
                                    alt="Insulated bottle with white base and black snap lid."
                                    class="h-24 w-24 rounded-lg object-cover object-center sm:h-32 sm:w-32">
                            </div>

                            <div class="relative ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                <div>
                                    <div class="flex justify-between sm:grid sm:grid-cols-2">
                                        <div class="pr-6">
                                            <h3 class="text-sm">
                                                <a href="#"
                                                    class="font-medium text-gray-700 hover:text-gray-800">Nomad Tumbler</a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">White</p>
                                        </div>

                                        <p class="text-right text-sm font-medium text-gray-900">$35.00</p>
                                    </div>

                                    <div class="mt-4 flex items-center sm:absolute sm:top-0 sm:left-1/2 sm:mt-0 sm:block">
                                        <label for="quantity-0" class="sr-only">Quantity, Nomad Tumbler</label>
                                        <select id="quantity-0" name="quantity-0"
                                            class="block max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>

                                        <button type="button"
                                            class="ml-4 text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:ml-0 sm:mt-3">
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                </div>

                                <p class="mt-4 flex space-x-2 text-sm text-gray-700">
                                    <!-- Heroicon name: mini/check -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>In stock</span>
                                </p>
                            </div>
                        </li>

                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg"
                                    alt="Front of men&#039;s Basic Tee in sienna."
                                    class="h-24 w-24 rounded-lg object-cover object-center sm:h-32 sm:w-32">
                            </div>

                            <div class="relative ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                <div>
                                    <div class="flex justify-between sm:grid sm:grid-cols-2">
                                        <div class="pr-6">
                                            <h3 class="text-sm">
                                                <a href="#"
                                                    class="font-medium text-gray-700 hover:text-gray-800">Basic Tee</a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">Sienna</p>

                                            <p class="mt-1 text-sm text-gray-500">Large</p>
                                        </div>

                                        <p class="text-right text-sm font-medium text-gray-900">$32.00</p>
                                    </div>

                                    <div class="mt-4 flex items-center sm:absolute sm:top-0 sm:left-1/2 sm:mt-0 sm:block">
                                        <label for="quantity-1" class="sr-only">Quantity, Basic Tee</label>
                                        <select id="quantity-1" name="quantity-1"
                                            class="block max-w-full rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>

                                        <button type="button"
                                            class="ml-4 text-sm font-medium text-indigo-600 hover:text-indigo-500 sm:ml-0 sm:mt-3">
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                </div>

                                <p class="mt-4 flex space-x-2 text-sm text-gray-700">
                                    <!-- Heroicon name: mini/check -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>In stock</span>
                                </p>
                            </div>
                        </li>

                        <!-- More products... -->
                    </ul>
                </div>

                <!-- Order summary -->
                <div class="mt-10 sm:ml-32 sm:pl-6">
                    <div class="rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:p-8">
                        <h2 class="sr-only">Order summary</h2>

                        <div class="flow-root">
                            <dl class="-my-4 divide-y divide-gray-200 text-sm">
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-gray-600">Subtotal</dt>
                                    <dd class="font-medium text-gray-900">$99.00</dd>
                                </div>
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-gray-600">Shipping</dt>
                                    <dd class="font-medium text-gray-900">$5.00</dd>
                                </div>
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-gray-600">Tax</dt>
                                    <dd class="font-medium text-gray-900">$8.32</dd>
                                </div>
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-base font-medium text-gray-900">Order total</dt>
                                    <dd class="text-base font-medium text-gray-900">$112.32</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button type="submit"
                            class="w-full rounded-md border border-transparent bg-red-500 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
                    </div>

                    <div class="mt-6 text-center text-sm text-gray-500">
                        <p>
                            or
                            <a href="/" class="font-medium text-red-600 hover:text-red-500">
                                Continue Shopping
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
