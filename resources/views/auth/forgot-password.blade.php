@extends('layouts.layout')
@section('content')
    <section class="relative h-svh flex items-center">
        <div class="w-full sm:max-w-md  px-6 py-5 bg-white shadow-md overflow-hidden sm:rounded-lg container mx-auto  ">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full py-1.5 px-2.5" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
            <div class="bg-black bg-opacity-50 w-full h-full inset-0 absolute -z-10"></div>
        </div>
    </section>
@endsection
