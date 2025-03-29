<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CommentController;



use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogCategoryController;

Route::resource('articles', ArticleController::class);
Route::resource('blog-categories', BlogCategoryController::class);




Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');


Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');


Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');





// Ruta para listar artículos
Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});

// Ruta para ver un artículo
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');




// Rutas de artículos
Route::resource('articles', ArticleController::class);


// Página de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('articles', ArticleController::class);




Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
});




Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');







Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');







Route::resource('blog', BlogController::class);


Route::resource('categories', CategoryController::class);




Route::resource('products', ProductController::class);



Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);



Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);



Route::resource('articles', ArticleController::class);

Route::resource('comments', CommentController::class);


Route::resource('products', ProductController::class);


Route::resource('categories', CategoryController::class);




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

