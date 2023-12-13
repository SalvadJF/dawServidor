@extends('layouts.app')

@section('content')

<h1>Actualizar película</h1>

<form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $pelicula->titulo }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

@endsection
