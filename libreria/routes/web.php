<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EstanteriaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\SeccionController;

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

// Rutas de Recursos
Route::resource('libros', LibroController::class);
Route::resource('estanterias', EstanteriaController::class);
Route::resource('autores', AutorController::class);
Route::resource('secciones', SeccionController::class);

// Rutas de web
Route::get('/estanterias', [EstanteriaController::class, 'index']);
Route::get('/estanterias/{estanteria}', [EstanteriaController::class,'show']);

Route::get('/libros', [LibroController::class, 'index']);
Route::get('/libros/{libro}', [LibroController::class,'show']);

Route::get('/autores', [AutorController::class, 'index']);
Route::get('/autores/{autor}', [AutorController::class,'show']);

Route::get('/secciones', [SeccionController::class, 'index']);
Route::get('/secciones/{seccion}', [SeccionController::class,'show']);

require __DIR__.'/auth.php';
