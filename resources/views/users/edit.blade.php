@extends('layouts.app')

@section('title', 'Edit User')

@section('page-title', 'Edit User')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit User</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-300" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-300">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Role</label>
                <select name="role" class="w-full px-2 py-2 border rounded-lg focus:ring focus:ring-purple-300">
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                    <option value="user" @selected(old('role', $user->role) === 'user')>User</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Status</label>
                <select name="status" class="w-full px-2 py-2 border rounded-lg focus:ring focus:ring-purple-300">
                    <option value="1" @selected((string) old('status', $user->status) === '1')>Active</option>
                    <option value="0" @selected((string) old('status', $user->status) === '0')>Inactive</option>
                </select>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                    Back
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-purple-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
