<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;
use App\Models\Post;

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
    return view('principal', [
        'posts' => Post::with('categoria', 'comentario')->get()
    ]);
})->name('principal');

Route::get('/principal', function () {
    return view('principal', [
        'posts' => Post::with('categoria', 'comentario')->get()
    ]);
})->name('principal');

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
Route::resource('categorias', CategoriaController::class)->middleware('auth');

// Rutas para comentarios
Route::resource('comentarios', ComentarioController::class);

// Rutas web

// Rutas para usuarios
Route::get('/users', [UserController::class, 'index']);


// Rutas para publicaciones (posts)
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/postear', [PostController::class, 'create'])->name('postear')->middleware('auth');
Route::get('/editar', [PostController::class, 'update'])->name('editar')->middleware('auth');
Route::get('/borrar', [PostController::class, 'destroy'])->name('borrar')->middleware('auth');

// Rutas para categorías
Route::get('/categorias', [CategoriaController::class, 'index']);


// Rutas para comentarios
Route::get('/comentarios', [ComentarioController::class, 'index']);



require __DIR__.'/auth.php';
