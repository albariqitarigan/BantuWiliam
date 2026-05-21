@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('page-title', 'Admin Dashboard')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard Admin</h2>
        <p class="mt-2 text-gray-600">Selamat datang, {{ auth()->user()->name }}. Halaman ini hanya bisa diakses oleh admin.</p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            <a href="{{ route('users.index') }}" class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                <div class="font-semibold text-gray-800">Kelola Users</div>
                <div class="mt-1 text-sm text-gray-500">Tambah, edit, dan hapus data user.</div>
            </a>
            <a href="{{ route('products.index') }}" class="rounded-lg border border-gray-200 p-4 hover:bg-gray-50">
                <div class="font-semibold text-gray-800">Kelola Products</div>
                <div class="mt-1 text-sm text-gray-500">Tambah, edit, dan hapus data product.</div>
            </a>
        </div>
    </div>
@endsection
