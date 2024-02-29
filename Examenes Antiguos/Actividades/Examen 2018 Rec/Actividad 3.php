<?php 

// Implementar en site/index un buscador integrado que, usando una única
// barra de búsqueda, localice aquellos álbumes, canciones y artistas (las tres cosas a la vez)
// que contengan la cadena a buscar. Los resultados incluirán enlaces a las correspondientes
// acciones view de cada elemento

// Paso 1: Crear la vista

// En primer lugar, crea la vista index.blade.php en el directorio resources/views/site/ 
//  para la página de inicio. Añade un formulario de búsqueda que envíe los términos de búsqueda 
// al controlador para su procesamiento.

<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>

// Paso 2: Definir la ruta y el controlador

// Define una ruta en routes/web.php para manejar la búsqueda y crea un método en el controlador correspondiente 
// (SiteController, por ejemplo) para procesar la búsqueda.



Route::get('/site/index', 'SiteController@index')->name('site.index');
Route::get('/site/search', 'SiteController@search')->name('search');

// En el controlador SiteController, crea el método search() para procesar la búsqueda.



use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;

public function search(Request $request)
{
    $query = $request->input('query');

    $albums = Album::where('title', 'LIKE', "%$query%")->get();
    $songs = Song::where('title', 'LIKE', "%$query%")->get();
    $artists = Artist::where('name', 'LIKE', "%$query%")->get();

    return view('site.search', compact('albums', 'songs', 'artists'));
}

// Paso 3: Mostrar los resultados

// Crea una vista search.blade.php en el directorio resources/views/site/ para mostrar los resultados de la búsqueda.


<h2>Resultados de la búsqueda:</h2>

<h3>Álbumes:</h3>
@foreach($albums as $album)
    <p><a href="{{ route('albums.show', $album->id) }}">{{ $album->title }}</a></p>
@endforeach

<h3>Canciones:</h3>
@foreach($songs as $song)
    <p><a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a></p>
@endforeach

<h3>Artistas:</h3>
@foreach($artists as $artist)
    <p><a href="{{ route('artists.show', $artist->id) }}">{{ $artist->name }}</a></p>
@endforeach

// Paso 4: Establecer el formulario de búsqueda en la página de inicio

Por último, en la vista index.blade.php, establece el formulario de búsqueda.



@extends('layouts.app')

@section('content')
    <!-- Contenido de la página de inicio -->

    <!-- Formulario de búsqueda -->
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="query" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
@endsection