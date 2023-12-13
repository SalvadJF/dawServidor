<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear película</title>
</head>
<body>
    <h1>Crear película</h1>

    <form action="{{ route('peliculas.store') }}" method="post">
        @csrf

        <input type="text" name="titulo" placeholder="Título">
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
