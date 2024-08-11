@extends('layouts.app')

@section('content')
<div class="container px-5 py-24 mx-auto flex">
    <div
        class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Login</h2>
        <p class="leading-relaxed mb-5 text-gray-600">Enter your credentials to access your account.</p>

        <!-- Form for login -->
        <form method="POST" action="{{ route('login.auth') }}">
            @csrf

            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @error('password')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <button
                class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
        </form>

        {{-- <p class="text-xs text-gray-500 mt-3">Forgot your password? <a href="{{ route('password.request') }}"
                class="text-indigo-500 hover:underline">Reset it here</a>.</p> --}}
    </div>

</div>
@endsection