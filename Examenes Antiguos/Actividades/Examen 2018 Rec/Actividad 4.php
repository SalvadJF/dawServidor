<?php 

//  En albumes/index, mostrar también la duración total del álbum como una
// columna más que admita filtrado y ordenación y que esté formateada como minutos:segundos

// Paso 1: Modificar el controlador

// En el controlador AlbumController, modifica el método index() para calcular la duración total de 
// cada álbum y pasarla a la vista.


use App\Models\Album;

public function index()
{
    $albums = Album::with('songs')->get();

    // Calcular la duración total de cada álbum
    foreach ($albums as $album) {
        $totalDuration = $album->songs->sum('duration');
        $album->total_duration = gmdate("i:s", $totalDuration);
    }

    return view('albumes.index', compact('albums'));
}

// Paso 2: Modificar la vista

// En la vista albumes/index.blade.php, agrega una nueva columna para mostrar la duración total del álbum.


<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Artista</th>
            <th>Duración Total</th> <!-- Nueva columna -->
            <!-- Otras columnas -->
        </tr>
    </thead>
    <tbody>
        @foreach($albums as $album)
            <tr>
                <td>{{ $album->title }}</td>
                <td>{{ $album->artist->name }}</td>
                <td>{{ $album->total_duration }}</td> <!-- Duración Total -->
                <!-- Otras columnas -->
            </tr>
        @endforeach
    </tbody>
</table>

// Paso 3: Establecer filtrado y ordenación en la columna de duración total

// Para permitir el filtrado y la ordenación en la columna de duración total, puedes utilizar bibliotecas 
// de JavaScript como DataTables o simplemente utilizar JavaScript puro para implementar esta funcionalidad.

// Aquí hay un ejemplo básico usando DataTables:

// En la vista albumes/index.blade.php, incluye DataTables y establece la clase de la tabla como datatable.

html

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<table class="datatable">
    <!-- Contenido de la tabla -->
</table>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

// Con estos pasos, deberías poder mostrar la duración total del álbum como una columna en la vista albumes/index 
//y permitir la filtración y ordenación en esta columna. Asegúrate de ajustar el código según tus necesidades específicas
// y la estructura de tu aplicación.