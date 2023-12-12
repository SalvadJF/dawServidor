<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Recursos

// Rutas para usuarios
Route::resource('users', UserController::class);

// Rutas para publicaciones (posts)
Route::resource('posts', PostController::class);

// Rutas para categorías
Route::resource('categorias', CategoriaController::class);

// Rutas para comentarios
Route::resource('comentarios', ComentarioController::class);

// Rutas web

// Rutas para usuarios
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);

// Rutas para publicaciones (posts)
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

// Rutas para categorías
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show']);

// Rutas para comentarios
Route::get('/comentarios', [ComentarioController::class, 'index']);
Route::get('/comentarios/{comentario}', [ComentarioController::class, 'show']);


require __DIR__.'/auth.php';
