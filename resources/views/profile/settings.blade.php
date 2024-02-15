@extends('layouts.layout')
@section('content')
    <div class="mx-auto container mt-4 max-w-[1200px] py-5">
        <div class=" py-1.5">
            <h2 class="text-base md:text-2xl lg:text-4xl">Settings</h2>
            <p class="text-gray-400">Welcome to your settings page! Explore, manage, and enjoy personalized features tailored
                just for you.</p>
        </div>
        <form action="/settings/update-password" method="post"
            class="grid grid-cols-1 sm:w-96 mt-2 gap-y-2 mb-4 sm:grid-cols-1 sm:gap-x-8" enctype="multipart/form-data">
            @csrf
            <h4 class="text-sm capitalize">Change the password</h4>
            <div>
                <label for="oldPassword" class="block text-sm font-medium text-gray-700 mb-2">Old Passowrd</label>
                <div class="mt-1">
                    <input type="password" name="oldPassword" id="oldPassword"
                        class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                        placeholder="Old Password">
                    @error('oldPassword')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="newPassord" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <div class="mt-1">
                    <input type="password" name="password" id="oldPassword"
                        class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                        placeholder="New Password">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="passwordConfirm" class="block text-sm font-medium text-gray-700 mb-2">Confirm Passowrd</label>
                <div class="mt-1">
                    <input type="password" name="password_confirmation" id="passwordConfirm"
                        class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                        placeholder="password-confirmation">
                    @error('password_confirmation')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-md w-fit">Update</button>
        </form>
        {{-- //delete section --}}
        <form action="/profile" method="post" class="grid grid-cols-1 sm:w-96 mt-5 gap-y-2 sm:grid-cols-1 sm:gap-x-8"
            enctype="multipart/form-data">
            @csrf
            @method('delete')
            <h4 class="text-sm capitalize">enter the password for procceed deleting process</h4>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Your Password</label>
                <div class="mt-1">
                    <input type="password" name="password" id="oldPassword"
                        class="block w-full rounded-md border border-gray-500 shadow-sm focus:border-red-500 focus:outline-none py-3 px-4  sm:text-sm"
                        placeholder="Your Password">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-md w-fit capitalize">delete
                account</button>
        </form>

    </div>
@endsection
