<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Product Controller Routes
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/your-inventory', [ProductController::class, 'create'])->name('create') ->middleware('custom.auth');
Route::get('/fetch-products', [ProductController::class, 'fetch'])->name('fetch');
Route::get('/products/fetch-blade', [ProductController::class, 'fetchBlade'])->name('fetch.blade');
Route::post('/save-product', [ProductController::class, 'store'])->name('store');

// Auth Controller Routes
Route::get('/login', [AuthController::class, 'loginView'])->name('auth.loginView');
Route::get('/register', [AuthController::class, 'registerView'])->name('auth.registerView');
Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('auth.registerUser');
Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('auth.loginUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::delete('/destroy', [ProductController::class, 'destroy'])->name('delete');