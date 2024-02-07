@extends('layouts.layout')
@section('content')
    <section class="relative h-svh bg-grey-darker flex items-center">
        <div class="w-full sm:max-w-md  px-6 py-5 bg-white shadow-lg overflow-hidden sm:rounded-lg container mx-auto  ">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h4 class="text-center md:text-2xl mt-4 mb-2.5">Register</h4>
                <!-- Name -->
                <div>
                    <x-input-label for="fname" :value="__('First Name')" />
                    <x-text-input id="fname" class="block mt-1 w-full py-1.5 px-2.5" type="text" name="firstName"
                        :value="old('firstName')" required autofocus autocomplete="name" placeholder="First Name" />
                    <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="lname" :value="__('Last Name')" class="mt-3" />
                    <x-text-input id="lname" class="block mt-1 w-full py-1.5 px-2.5" type="text" name="lastName"
                        :value="old('lastName')" required autofocus autocomplete="name" placeholder="Last Name" />
                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full py-1.5 px-2.5" type="email" name="email"
                        :value="old('email')" required autocomplete="username" placeholder="email@gmail.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full py-1.5 px-2.5" type="password" name="password"
                        placeholder="Password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full py-1.5 px-2.5" type="password"
                        placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4 bg-red-500 hover:bg-red-800">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
            {{-- <div class="bg-black bg-opacity-50 w-full h-full inset-0 absolute -z-10"></div> --}}
        </div>
    </section>
@endsection
