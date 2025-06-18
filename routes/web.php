<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/your-inventory', [ProductController::class, 'create'])->name('create');
Route::get('/fetch-products', [ProductController::class, 'fetch'])->name('fetch');
Route::get('/products/fetch-blade', [ProductController::class, 'fetchBlade'])->name('fetch.blade');
Route::post('/save-product', [ProductController::class, 'store'])->name('store');