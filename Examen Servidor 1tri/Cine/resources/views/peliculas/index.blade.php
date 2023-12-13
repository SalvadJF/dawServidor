<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de películas</title>
</head>
<body>
    <h1>Listado de películas</h1>

    <table>
        <thead>
            <tr>
                <th>Título</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
