@extends('layouts.layout')
@section('content')
    <div class="mx-auto container mt-4 max-w-[1200px] py-5">
        <div class=" py-1.5">
            <h2 class="text-base md:text-2xl lg:text-4xl">Profile</h2>
            <p class="text-gray-400">Welcome to your profile! Explore, manage, and enjoy personalized features tailored just
                for you.</p>
        </div>
        <div class="py-2 ">
            <div class="mb-5">
                <label for="image" class="block">Photo Profile</label>
                <img class="inline-block h-14 w-14 rounded-full object-fill"
                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                    alt="{{ $user->firstName . $user->lastName }}">
            </div>
            <form action="{{ route('profile.update') }}" method="post"
                class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div>
                    <label for="fname" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <div class="mt-1">
                        <input type="text" name="firstName" id="fname"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                            placeholder="First Name" value="{{ $user->firstName }}">
                    </div>
                </div>
                <div>
                    <label for="lname" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                    <div class="mt-1">
                        <input type="text" name="lastName" id="lname"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4 sm:text-sm"
                            placeholder="First Name" value="{{ $user->lastName }}">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email"
                            placeholder="example@gmail.com" value="{{ $user->email }}"
                            class="block w-full rounded-md border-gray-500 py-3 px-4 shadow-sm border hover:border-red-500 focus:outline-none">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="country"
                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-2">Country</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <select id="country" name="country" autocomplete="country-name"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm">
                            <option>United States</option>
                            <option>Canada</option>
                            <option>Mexico</option>
                        </select>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-2">
                        photo</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <div
                            class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-medium ">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="avatar" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="street-address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-2">Street
                        address</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <input type="text" name="streetAddress" id="street-address" autocomplete="street-address"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                            value="{{ $user->street_address ? $user->street_address : null }}">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="city" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-2">City</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <input type="text" name="city" id="city" autocomplete="address-level2"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                            value="{{ $user->city ? $user->city : null }}">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="region" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-2">State /
                        Province</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <input type="text" name="state" id="region" autocomplete="address-level1"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                            value="{{ $user->state ? $user->state : null }}">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="postal-code" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2 mb-2">ZIP /
                        Postal
                        code</label>
                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                        <input type="text" name="postalCode" id="postal-code" autocomplete="postal-code"
                            class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                            value="{{ $user->postalCode ? $user->postalCode : null }}">
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <button class="bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-700"
                        type="submit">Update</button>
                    <button class="bg-gray-500 text-black px-3 py-1.5 rounded-md hover:bg-gray-900 " type="button">
                        <a href="/" class="text-white">Cancel</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
