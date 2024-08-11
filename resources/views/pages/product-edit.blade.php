@extends('layouts.app')

@section('content')
<div class="container px-5 py-24 mx-auto">
    <div class="flex justify-between mb-4">
        <a href="{{ route('get.products') }}"
            class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">View
            products</a>
        @if (session('success'))
        <div class="p-3">
            <p class="text-center text-green-500">{{ session('success') }}</p>
        </div>
        @endif

    </div>
    <form action="{{ route('update.product',$product->id) }}" method="POST"
        class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
        @csrf
        @method('put')
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font text-center">Edit products</h2>

        <div class="relative mb-4">
            <label for="title" class="leading-7 text-sm text-gray-600">Product Title</label>
            <input type="text" id="title" name="name" value="{{ $product->name }}"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('name')
            <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="relative mb-4">
            <label for="price" class="leading-7 text-sm text-gray-600">Product Price</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('price')
            <p class="text-red-500 text-xs">{{ $message }}</p>

            @enderror
        </div>
        <div class="relative mb-4">
            <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
            <textarea id="description" name="description"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out text-left">
                {{ $product->description }}
            </textarea>
            @error('description')
            <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>

    </form>
</div>
@endsection