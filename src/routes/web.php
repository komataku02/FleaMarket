<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/items', [ItemController::class, 'index'])->name('items');

Route::get('/detail/{id}', [ItemController::class, 'show'])->name('items.show');

Route::post('/detail/{id}/toggle-favorite', [ItemController::class, 'toggleFavorite'])->name('items.toggleFavorite');