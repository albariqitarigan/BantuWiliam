<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');   
Route::get('/users/edit', function () {
    return view('users.edit'); })->name('users.edit');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', function () {
    return view('products.create'); })->name('products.create');
Route::get('/products/edit', function () {
    return view('products.edit'); })->name('products.edit');
