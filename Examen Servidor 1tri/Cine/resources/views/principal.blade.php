<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Películas</title>
</head>
<body>
    <h1>Películas</h1>

    <ul>
        <li><a href="{{ route('peliculas.index') }}">Listado de películas</a></li>
        <li><a href="{{ route('peliculas.create') }}">Crear película</a></li>
    </ul>
</body>
</html>
