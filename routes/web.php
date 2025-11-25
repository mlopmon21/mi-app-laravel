<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\ArticlesController;   // solo si sigues usando /articles/test
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;



// RUTAS "HOLA"
Route::get('/hola', [HolaController::class, 'index']);
Route::get('/hola/{nombre}', [HolaController::class, 'show']);

//Ejercicio 3
// Route::get('/articles-demo', [HolaController::class, 'articles']);

// Ejercicio 4 - ruta de pruebas Eloquent (JSON)
Route::get('/articles/test', [ArticlesController::class, 'test']);

// Ejercicio 5 - LISTADO de artículos
Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

// Ejercicio 7 - FORMULARIO de creación (GET)
Route::get('/articles/create', [ArticleController::class, 'create'])
    ->name('articles.create');

// Ejercicio 7 - GUARDAR nuevo artículo (POST)
Route::post('/articles', [ArticleController::class, 'store'])
    ->name('articles.store');

// Ejercicio 6 - DETALLE del artículo (IMPORTANTE: después del create)
Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');

// Ejercicio 8 - BORRADO del artículo
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/', function () {
    return view('welcome');
});

//Ejercicio 9 - Autenticación con Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
