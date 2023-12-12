<?php 

// Creacion de la ruta

Route::get('/peliculas/{id}', [PeliculaController::class, 'show']);

// Calculo de entradas
$entradas = Entrada::where('pelicula_id', $pelicula->id)->count();

// Show modificado

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Entrada;

class PeliculaController extends Controller
{
    public function show($id)
    {
        $pelicula = Pelicula::find($id);
        $entradas = Entrada::where('pelicula_id', $pelicula->id)->count();

        return view('peliculas.show', [
            'pelicula' => $pelicula,
            'entradas' => $entradas,
        ]);
    }
}

