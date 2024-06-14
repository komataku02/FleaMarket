<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;

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

Route::post('/comments/{item}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/display_item', [ItemController::class, 'create'])->name('items.create')->middleware('auth');
Route::post('/display_item', [ItemController::class, 'store'])->name('items.store');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{itemId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


Route::middleware('auth')->group(function () {
  Route::get('/mypage/profile_change', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::post('/mypage/profile_change', [ProfileController::class, 'update'])->name('profile.update');
  Route::post('/mypage/profile_change/delete-image', [ProfileController::class, 'deleteImage'])->name('profile.deleteImage');
  Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage.index');
  Route::get('/mypage/purchased_items', [PurchaseHistoryController::class, 'index'])->name('mypage.purchased_items');
  Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
  Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
  Route::post('/cart/add/{item}', [CartController::class, 'addToCart'])->name('cart.add');
  Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
  Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
  Route::get('/address/edit', [AddressController::class, 'edit'])->name('address.edit');
  Route::post('/address/update', [AddressController::class, 'update'])->name('address.update');

  Route::get('payment/method', [PaymentController::class, 'selectPaymentMethod'])->name('payment.method');
  Route::post('payment/method', [PaymentController::class, 'updatePaymentMethod'])->name('payment.updateMethod');
  Route::get('/payment/{itemId}/{price}', [PaymentController::class, 'show'])->name('payment.show');
  Route::post('/payment/{itemId}', [PaymentController::class, 'store'])->name('payment.store');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
  Route::get('/admin/items', [AdminController::class, 'items'])->name('admin.items');
  Route::get('/admin/payments', [AdminController::class, 'payments'])->name('admin.payments');
});
