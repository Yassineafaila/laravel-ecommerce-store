@extends('layouts.layout')
@section('content')
    <div class="bg-gray-50">
        <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Checkout</h2>

            <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" method="post" action="/products/cart/confirm-order">
                @method('post')
                @csrf
                <div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-4">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <div class="mt-1">
                                <input type="email" id="email-address" value="{{ auth()->user()->email }}" name="email"
                                    autocomplete="email"
                                    class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                @error('eamil')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                <div class="mt-1">
                                    <input type="text" id="first-name" value="{{ auth()->user()->firstName }}"
                                        name="firstName" autocomplete="given-name"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    @error('firstName')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <div class="mt-1">
                                    <input type="text" id="last-name" value="{{ auth()->user()->lastName }}"
                                        name="lastName" autocomplete="family-name"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    @error('lastName')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <div class="mt-1">
                                    <input type="text" name="city" value="{{ auth()->user()->city }}"
                                        placeholder="{{ auth()->user()->city ? auth()->user()->city : 'Set The City' }}"
                                        id="city" autocomplete="address-level2"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    @error('city')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <div class="mt-1">
                                    <select id="country" name="country" autocomplete="country-name"
                                        value="{{ auth()->user()->country }}"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    </select>
                                    @error('country')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="region" class="block text-sm font-medium text-gray-700">State /
                                    Province</label>
                                <div class="mt-1">
                                    <input type="text" name="region" value="{{ auth()->user()->state }}" id="region"
                                        placeholder="{{ auth()->user()->state ? auth()->user()->state : 'Set The State' }}"
                                        autocomplete="address-level1"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    @error('region')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal code</label>
                                <div class="mt-1">
                                    <input type="text" name="postalCode" id="postal-code" autocomplete="postal-code"
                                        value="{{ auth()->user()->postalCode }}"
                                        placeholder="{{ auth()->user()->postalCode ? auth()->user()->postalCode : 'Set The Postal Code' }}"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    @error('postalCode')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <div class="mt-1">
                                    <input type="text" name="phone" id="phone" autocomplete="tel"
                                        placeholder="Add Phone Number"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                    @error('phone')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Payment -->
                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                        <fieldset class="mt-4">
                            <legend class="sr-only">Payment type</legend>
                            <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                <div class="flex items-center">
                                    <input id="credit-card" name="payment-type" type="radio" checked
                                        class="h-4 w-4 py-2.5 px-2 border-gray-300 text-red-600 focus:ring-red-500">
                                    <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700">Credit
                                        card</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="paypal" name="payment-type" type="radio"
                                        class="h-4 w-4 py-2.5 px-2 border-gray-300 text-red-600 focus:ring-red-500">
                                    <label for="paypal"
                                        class="ml-3 block text-sm font-medium text-gray-700">PayPal</label>
                                </div>

                                <div class="flex items-center">
                                    <input id="etransfer" name="payment-type" type="radio"
                                        class="h-4 w-4 py-2.5 px-2 border-gray-300 text-red-600 focus:ring-red-500">
                                    <label for="etransfer"
                                        class="ml-3 block text-sm font-medium text-gray-700">eTransfer</label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                            <div class="col-span-4">
                                <label for="card-number" class="block text-sm font-medium text-gray-700">Card
                                    number</label>
                                <div class="mt-1">
                                    <input type="text" id="card-number" name="card-number" autocomplete="cc-number"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="col-span-4">
                                <label for="name-on-card" class="block text-sm font-medium text-gray-700">Name on
                                    card</label>
                                <div class="mt-1">
                                    <input type="text" id="name-on-card" name="name-on-card" autocomplete="cc-name"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="col-span-3">
                                <label for="expiration-date" class="block text-sm font-medium text-gray-700">Expiration
                                    date (MM/YY)</label>
                                <div class="mt-1">
                                    <input type="text" name="expiration-date" id="expiration-date"
                                        autocomplete="cc-exp"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                                <div class="mt-1">
                                    <input type="text" name="cvc" id="cvc" autocomplete="csc"
                                        class="block w-full py-2.5 px-2 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

                    <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
                        <h3 class="sr-only">Items in your cart</h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($cartItems as $item)
                                <li class="flex py-6 px-4 sm:px-6 ">
                                    @php
                                        $subString = 'images';
                                    @endphp
                                    <div class="flex-shrink-0">
                                        <img src="{{ strpos($item->product->image, $subString) === 0 ? asset($item->product->image) : asset('storage/' . $item->product->image) }}"
                                            alt="{{ $item->product->name }}"
                                            class="h-24 w-24 rounded-lg object-cover object-center sm:h-32 sm:w-32">
                                    </div>
                                    <div class="ml-6 flex-1 flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a href="#"
                                                        class="font-medium text-gray-700 hover:text-gray-800">
                                                        {{ $item->product->name }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="ml-4 flow-root flex-shrink-0">
                                            <button type="button" data-product="{{ $item->product->id }}"
                                                class="remove_from_cart_btn  -m-2 5 flex items-center justify-center bg-white p-2 text-gray-400 hover:text-gray-500">
                                                Remove
                                            </button>
                                        </div>
                                        <div class="flex-flex-1 items-end justify-between pt-2">
                                            <p>
                                                $
                                                <input type="number" readonly name="price_{{ $item->product->id }}"
                                                    value={{ $item->product->price * $item->Quantity }}
                                                    class="price bg-transparent border-0 outline-none" />
                                            </p>
                                            <div class="ml-4">
                                                <label for="quantity" class="sr-only">Quantity</label>
                                                <input type="number" id="quantity" name="quantity"
                                                    data-product="{{ $item->product->id }}" min=1
                                                    value="{{ $item->Quantity }}" max={{ $item->product->stockQuantity }}
                                                    class="block max-w-full rounded-md border border-gray-300 py-1.5 px-3 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 sm:text-sm">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <dl class="space-y-6 border-t border-gray-200 py-6 px-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Subtotal</dt>
                                <p>
                                    $
                                    <input type="number" name="subTotal" readonly value=0
                                        class="subTotal bg-transparent" />
                                </p>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Shipping</dt>
                                <p>
                                    $
                                    <input type="number" name="shipping" readonly value="5.00"
                                        class="shipping bg-transparent" />
                                </p>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt class="text-sm">Taxes</dt>
                                <p>
                                    $
                                    <input type="number" readonly name="tax" value="8.32"
                                        class="tax bg-transparent" />
                                </p>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                <dt class="text-base font-medium">Total</dt>
                                <p>
                                    $
                                    <input type="number" readonly name="total" value=0 class="total bg-transparent" />
                                </p>
                            </div>
                        </dl>

                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                            <button type="submit"
                                class="w-full rounded-md border border-transparent bg-red-500 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none ">Confirm
                                order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Cache DOM elements
            let prices = $(".price");
            let subTotal = $(".subTotal");
            let totalInput = $(".total");
            let taxInput = $(".tax");
            let shippingInput = $(".shipping");

            function calculateTotal() {
                let sum = 0;
                prices.each(function() {
                    sum += parseFloat($(this).val());
                });
                let subTotalValue = sum.toFixed(2);
                subTotal.val(subTotalValue);
                let totalValue = parseFloat(subTotalValue) + parseFloat(taxInput.val()) + parseFloat(shippingInput
                    .val());
                totalInput.val(totalValue.toFixed(2));
            }

            // Initial calculation
            calculateTotal();

            $("[name='quantity']").on("change", function() {
                let quantity = $(this).val();
                let product = $(this).data("product");
                let priceContainer = $(`[name='price_${product}']`);
                $.ajax({
                    url: "/products/cart/calc-subTotal",
                    method: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: {
                        quantity: quantity,
                        product: product
                    },
                    success: function(response) {
                        // Handle success response
                        if (response.subTotal) {
                            priceContainer.val(response.subTotal);
                            calculateTotal();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        if (xhr.status === 401) {
                            // User is unauthenticated, redirect to login page
                            window.location.href = '/login';
                        } else {
                            // Display error message or log error
                            console.error("Error occurred:", error);
                        }
                    }
                });
            });

            //Handle Remove A product From The Cart :
            $(".remove_from_cart_btn").on("click", function() {

                let productId = $(this).data("product");
                $.ajax({
                    method: 'post',
                    url: "/products/cart-shopping/remove",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: {
                        productId
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
                            // Display error message or log error
                            console.error("Error occurred:", error);
                        }
                    }
                })
            })
        });
    </script>
@endsection
