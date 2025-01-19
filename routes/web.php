<?php

use App\Livewire\Categories;
use App\Livewire\Login;
use App\Livewire\Products;
use App\Livewire\ShowCategory;
use App\Livewire\ShowItem;
use App\Livewire\CategoryItems;
use App\Livewire\Signup;
use App\Models\Item;
use Illuminate\Support\Facades\Route;


// Auth
Route::get('/login' , Login::class)->name('login');
Route::get('/signup' , Signup::class)->name('signup');




Route::get('/', function () {
    return view('index');
})->name('home');

// items
Route::get('/items/{item}', ShowItem::class)->name('item.show');
Route::get('/products', products::class)->name('products.index');

Route::get('/categories', Categories::class)->name('categories.index');
Route::get('/categories/{category}', CategoryItems::class)->name('categories.show');
Route::get('/category/{category}', showCategory::class)->name('category.show');


