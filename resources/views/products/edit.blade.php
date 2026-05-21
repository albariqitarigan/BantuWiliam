@extends('layouts.app')

@section('title', 'Edit Product')

@section('page-title', 'Edit Product')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Product</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Product Name</label>
                <input type="text" name="product_name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('product_name', $product->product_name) }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Price</label>
                <input type="number" name="price" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('price', $product->price) }}" min="0" step="0.01" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Stock</label>
                <input type="number" name="stock" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" value="{{ old('stock', $product->stock) }}" min="0" required>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                    Back
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
