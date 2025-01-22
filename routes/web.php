<?php

use App\Http\Livewire\CartCounter;
use App\Livewire\AddToCart;
use App\Livewire\Categories;
use App\Livewire\Index;
use App\Livewire\Login;
use App\Livewire\Products;
use App\Livewire\ShowCategory;
use App\Livewire\ShowItem;
use App\Livewire\CategoryItems;
use App\Livewire\Signup;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth
Route::middleware('guest')->group(function () {
    Route::get('/signup' , Signup::class)->name('signup');
    Route::get('/login' , Login::class)->name('login');
});

// cart
Route::middleware('auth')->group(function () {
    Route::get('/cart/{cart}', Cart::class)->name('cart') ;
    Route::get('/checkout', Checkout::class)->name('checkout');
});



Route::get('/logout' , function () {
    Auth::logout();
    return redirect('/')->with('success', 'You are now logged out');
})->name('logout');


Route::get('/', index::class )->name('home');


// items
Route::get('/items/{item}', ShowItem::class)->name('item.show');
Route::get('/products', products::class)->name('products.index');

Route::get('/categories', Categories::class)->name('categories.index');
Route::get('/categories/{category}', CategoryItems::class)->name('categories.show');
Route::get('/category/{category}', showCategory::class)->name('category.show');



