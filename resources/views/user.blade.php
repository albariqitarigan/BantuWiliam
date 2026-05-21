@extends('layouts.app')

@section('title', 'User Dashboard')

@section('page-title', 'User Dashboard')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard User</h2>
        <p class="mt-2 text-gray-600">Selamat datang, {{ auth()->user()->name }}. Ini halaman untuk user biasa.</p>
    </div>
@endsection
