<?php 

//  En albumes/view, mostrar todos los datos del álbum, incluyendo su imagen, su
// duración total, los datos de las canciones que lo forman (con paginación y ordenación) y
// los artistas que intervienen en él (sin paginación ni ordenación).

// Paso 1: Mostrar los datos del álbum

// En la vista albumes/view.blade.php, muestra los detalles del álbum, incluida su imagen y duración total.

html

<h1>{{ $album->title }}</h1>
<img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->title }}">

<p>Duración Total: {{ $album->total_duration }}</p>

// Paso 2: Mostrar las canciones con paginación y ordenación

// Para mostrar las canciones con paginación y ordenación, utiliza DataTables u otra biblioteca de JavaScript para gestionar la tabla.

html

<h2>Canciones</h2>
<table class="datatable">
    <thead>
        <tr>
            <th>Título</th>
            <th>Duración</th>
            <!-- Otros encabezados si es necesario -->
        </tr>
    </thead>
    <tbody>
        @foreach($album->songs as $song)
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ gmdate("i:s", $song->duration) }}</td>
                <!-- Otros datos de la canción si es necesario -->
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

// Paso 3: Mostrar los artistas sin paginación ni ordenación

// Simplemente itera sobre los artistas del álbum y muéstralos sin necesidad de paginación o ordenación.

html

<h2>Artistas</h2>
<ul>
    @foreach($album->artists as $artist)
        <li>{{ $artist->name }}</li>
    @endforeach
</ul>
