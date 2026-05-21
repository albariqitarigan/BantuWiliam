@extends('layouts.app')

@section('title', 'Users Management')

@section('page-title', 'Users Management')

@section('content')
    @if (session('success'))
        <div class="success-alert mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700 transition-opacity duration-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-lg shadow">
        <h2 class="text-2xl font-bold">Users</h2>
        <div>
            <a href="{{ route('users.create') }}" class="bg-white text-purple-500 hover:bg-gray-200 px-4 py-2 rounded shadow font-semibold">
                <i class="fas fa-plus mr-2"></i> Add User
            </a>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-gray-100 to-gray-300 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">User List</h3>
        </div>
        <div class="p-4 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->role }}</td>
                            @if ($user->status == 1)
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                            </td>
                            @else
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                            </td>
                            @endif
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        setTimeout(() => {
            document.querySelectorAll('.success-alert').forEach((alert) => {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 700);
            });
        }, 5000);
    </script>
@endpush
