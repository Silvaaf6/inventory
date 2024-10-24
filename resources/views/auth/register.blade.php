@extends('layouts.app')

@section('content')

<div class="container mx-auto flex justify-center p-6">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-center mb-6">{{ __('Register') }}</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Name') }}</label>
                        <input id="name" type="text"
                            class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                            class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="w-full px-3 py-2 border rounded-lg @error('password') border-red-500 @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password-confirm"
                            class="block text-gray-700 font-bold mb-2">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="w-full px-3 py-2 border rounded-lg"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4 flex justify-between items-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
