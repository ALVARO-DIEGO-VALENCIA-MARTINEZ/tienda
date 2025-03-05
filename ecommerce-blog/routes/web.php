<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;

// Página de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Página de contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Rutas para el e-commerce
Route::resource('products', ProductController::class);

// Rutas para el blog
Route::resource('blog', BlogController::class);
