@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex justify-center p-6">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-center mb-6">{{ __('Login') }}</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('Email Address') }}</label>
                        <input id="email" type="email"
                            class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4 flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 text-blue-500 border-gray-300 rounded" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <!-- Submit Button & Forgot Password -->
                    <div class="mb-4 flex justify-between items-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
