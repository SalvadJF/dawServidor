<?php 

// Creacion de la ruta

Route::get('/peliculas/{id}', [PeliculaController::class, 'show']);

// Calculo de entradas
$entradas = Entrada::where('pelicula_id', $pelicula->id)->count();

// Show modificado


public function show($id)
{
    $pelicula = Pelicula::find($id);

    $entradas = DB::table('entradas')
    ->whereIn('proyeccion_id', DB::table('proyecciones')
        ->where('pelicula_id', $pelicula->id)
        ->select('id')
        ->get()
        ->pluck('id')
    )
    ->count();

    return view('peliculas.show', [
        'pelicula' => $pelicula,
        'entradas' => $entradas,
    ]);
}


