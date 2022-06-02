<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;



Route::resource('products', ProductController::class);

Route::get('/edit/{id}', function ($id) {
    return view('home');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/create', function () {
    return view('home');
});

Route::get('/delete', function () {
    return view('home');
});

Route::get('/edit', function () {
    return view('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
