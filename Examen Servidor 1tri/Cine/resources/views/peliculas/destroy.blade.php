@extends('layouts.app')

@section('content')

<h1>Eliminar película</h1>

<p>¿Estás seguro de que quieres eliminar la película "{{ $pelicula->titulo }}"?</p>

<a href="{{ route('peliculas.destroy', $pelicula->id) }}" class="btn btn-danger">Eliminar</a>
<a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Cancelar</a>

@endsection
