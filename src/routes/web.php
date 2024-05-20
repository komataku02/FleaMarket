<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/my_items', [FavoriteController::class, 'index'])->name('favorites');

Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/items', [ItemController::class, 'index'])->name('items');

Route::get('/detail/{id}', [ItemController::class, 'show'])->name('items.show');

Route::post('/detail/{id}/favorite', [FavoriteController::class, 'Favorite'])->name('items.favorite')->middleware('auth');
Route::post('/detail/{id}/unfavorite', [FavoriteController::class, 'unfavorite'])->name('items.unfavorite')->middleware('auth');

Route::get('/detail/comment/{item_id}', [CommentController::class, 'show'])->name('comments.show');
Route::post('/detail/comment/{item_id}', [CommentController::class, 'store'])->name('comments.store');

Route::get('/display_item', [ItemController::class, 'create'])->name('items.create')->middleware('auth');
Route::post('/display_item', [ItemController::class, 'store'])->name('items.store');

Route::get('/payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');