@extends('layouts.app')

@section('title', 'Products Management')

@section('page-title', 'Products Management')

@section('content')
    <div class="flex justify-between items-center mb-6 bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-4 rounded-lg shadow">
        <h2 class="text-2xl font-bold">Products</h2>
        <div>
            <a href="{{ route('products.create') }}" class="bg-white text-blue-500 hover:bg-gray-200 px-4 py-2 rounded shadow font-semibold">
                <i class="fas fa-plus mr-2"></i> Add Product
            </a>
        </div>
    </div>

    <!-- Products Table -->
    @if (session('success'))
        <div id="alert-success"
            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 transition-opacity duration-500" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-300 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Product List</h3>
        </div>
        <div class="p-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($products->isEmpty())
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No products found.</td>
                        </tr>
                    @else
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->product_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->description }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $product->stock }}</td>
                                <td class="px-6 py-4">
                                    @if ($product->stock > 0)
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">In Stock</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Out of Stock</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-sm font-medium">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        setTimeout(function() {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
@endsection