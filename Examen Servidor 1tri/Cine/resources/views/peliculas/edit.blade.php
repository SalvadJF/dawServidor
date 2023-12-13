<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar película</title>
</head>
<body>
    <h1>Editar película</h1>

    <form action="{{ route('peliculas.update', $pelicula->id) }}" method="post">
        @csrf

        <input type="text" name="titulo" value="{{ $pelicula->titulo }}" placeholder="Título">
        <br>
        <input type="submit" value="Editar">
    </form>

    <a href="{{ route('peliculas.index') }}">Volver al listado</a>
</body>
</html>
