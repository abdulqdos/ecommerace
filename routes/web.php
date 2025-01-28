<?php

use App\Livewire\Admin;
use App\Livewire\Admin\Products as AdminProducts;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\editProduct;
use App\Livewire\AddToCart;
use App\Livewire\Cart;
use App\Livewire\CategoryItems;
use App\Livewire\Categories;
use App\Livewire\Checkout;
use App\Livewire\Dashboard;
use App\Livewire\Index;
use App\Livewire\Login;
use App\Livewire\Admin\Orders as AdminOrders;
use App\Livewire\Admin\showOrder;
use App\Livewire\Admin\Customers as AdminCustomers;
use App\Livewire\Products;
use App\Livewire\ShowCategory;
use App\Livewire\ShowItem;
use App\Livewire\Signup;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth
Route::middleware('guest')->group(function () {
    Route::get('/signup' , Signup::class)->name('signup');
    Route::get('/login' , Login::class)->name('login');
});


Route::get('/logout' , function () {
    Auth::logout();
    return redirect('/')->with('success', 'You are now logged out');
})->name('logout');



// cart
Route::middleware('auth')->group(function () {
    Route::get('/cart/{cart}', Cart::class)->name('cart') ;
    Route::get('/checkout', Checkout::class)->name('checkout');
});

Route::get('/', index::class )->name('home');


// items
Route::get('/items/{item}', ShowItem::class)->name('item.show');
Route::get('/products', products::class)->name('products.index');
Route::get('/categories', Categories::class)->name('categories.index');
Route::get('/categories/{category}', CategoryItems::class)->name('categories.show');
Route::get('/category/{category}', showCategory::class)->name('category.show');


// Admin Page
Route::middleware( 'admin')->group(function () {
    Route::get('/admin' ,dashboard::class)->name('admin.index');

    // Products side
    Route::get('/admin/products' , AdminProducts::class)->name('admin.products');
    Route::get('/admin/products/create' , AddProduct::class)->name('admin.products.create');
    Route::get('/admin/products/{product}/edit' , editProduct::class)->name('admin.products.edit');


    // orders side
    Route::get('/admin/orders' , AdminOrders::class)->name('admin.orders');
    Route::get('/admin/orders/{order}' , showOrder::class)->name('admin.orders.show');

    Route::get('/admin/customers' , AdminCustomers::class)->name('admin.customers');
});
