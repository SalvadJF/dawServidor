@extends('layouts.app')

@section('content')

<h1>Crear película</h1>

<form action="{{ route('peliculas.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection
