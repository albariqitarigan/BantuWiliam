@extends('layouts.app')

@section('title', 'Create User')

@section('page-title', 'Create User')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Create New User</h2>

        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-300" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Role</label>
                <select name="role" class="w-full px-2 py-2 border rounded-lg focus:ring focus:ring-purple-300">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Status</label>
                <select name="status" class="w-full px-2 py-2 border rounded-lg focus:ring focus:ring-purple-300">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div> 
            <div class="flex justify-between">
                <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                    Back
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-purple-600">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
