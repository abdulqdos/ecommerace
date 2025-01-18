<?php

use App\Livewire\ShowItem;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// items
Route::get('/items/{item}', ShowItem::class)->name('item.show');
Route::get('/categories', function () {
    return view('categories.index');
});


