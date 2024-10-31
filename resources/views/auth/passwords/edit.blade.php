@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center mb-6">Edit Password</h2>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4 flex justify-between ">
                    <label for="current_password" class="block text-gray-700 font-medium mb-2">Password Lama</label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <input type="password" id="current_password" name="current_password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="mb-4 mt-3">
                    <label for="new_password" class="block text-gray-700 font-medium mb-2">Password Baru</label>
                    <input type="password" id="new_password" name="new_password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-6">
                    <label for="new_password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password
                        Baru</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg">
                    Update Password
                </button>
            </form>
        </div>
    </div>
@endsection
