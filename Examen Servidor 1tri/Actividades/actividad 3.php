<?php 
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

// Creacion de la ruta

Route::get('/peliculas/{id}', [PeliculaController::class, 'show']);

// Show modificado


public function show(Pelicula $pelicula)
{
    $pelicula = Pelicula::find($id);

    $entradas = $pelicula->entrada->count();

    return view('peliculas.show', [
        'pelicula' => $pelicula,
        'entradas' => $entradas,
    ]);
}

// Otra forma




// Usando Has many Through

Modelo Proyeccion

protected $table = 'proyecciones';
// Con esto enlazamos el modelo con la tabla, util cuando el nombre entenga problemas con los metodos de Laravel

Modelo Pelicula 

public function entradas()
{
    // usando las relaciones
    return $this->through('proyecciones')->has('entradas')
    //  Usando las Clases return $this->hasManyThrough(Entrada::class, Proyeccion::class)

}

// Esto devolveria la cantidad
$pelicula->entrada->count();