<?php 

// En canciones/view, mostrar todos los datos de la canción, incluyendo los
// artistas que intervienen en él y los álbumes en los que aparecen.

// Paso 1: Mostrar los datos de la canción

// Muestra los detalles de la canción, como título, duración u otros campos relevantes.

html

<h1>{{ $song->title }}</h1>
<p>Duración: {{ gmdate("i:s", $song->duration) }}</p>
<!-- Otros detalles de la canción -->

// Paso 2: Mostrar los artistas que intervienen en la canción

// Itera sobre los artistas relacionados con la canción y muéstralos.

html

<h2>Artistas</h2>
<ul>
    @foreach($song->artists as $artist)
        <li>{{ $artist->name }}</li>
    @endforeach
</ul>

// Paso 3: Mostrar los álbumes en los que aparece la canción

// Itera sobre los álbumes relacionados con la canción y muéstralos.

html

<h2>Álbumes</h2>
<ul>
    @foreach($song->albums as $album)
        <li>{{ $album->title }}</li>
    @endforeach
</ul>
