@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-12">
    <div class="relative overflow-x-auto  mx-auto">
        <div class="flex justify-between mb-4">
            <a href="{{ route('add.products') }}"
                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add
                products</a>
            @if (session('success'))
            <div class="p-3">
                <p class="text-center text-green-500">{{ session('success') }}</p>
            </div>
            @endif
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

                @if (isset($products) && $products->count() > 0)
                @foreach ($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                    </th>

                    <td class="px-6 py-4">
                        ${{ $product->price }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $product->description }}
                    </td>

                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('edit.products',$product->id) }}"
                            class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Edit</a>

                        <form action="{{ route('delete.product',$product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach

                @else
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" colspan="2"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        Product Not Found
                    </th>
                </tr>
                @endif


            </tbody>
        </table>
    </div>

</div>
@endsection