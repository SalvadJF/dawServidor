<?php 

// Subida de la imagen miniaturizada del álbum en albumes/create y albumes/update

// Paso 1: Modificar las vistas

resources/views/albums/create.blade.php



<form method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Otros campos del formulario -->
    <div class="form-group">
        <label for="image">Imagen del álbum:</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Crear álbum</button>
</form>

resources/views/albums/edit.blade.php


<form method="POST" action="{{ route('albums.update', $album->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Otros campos del formulario -->
    <div class="form-group">
        <label for="image">Imagen del álbum:</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar álbum</button>
</form>

// Paso 2: Modificar el controlador

// Ahora, necesitarás modificar el método store() y update() del controlador de álbumes 
// (AlbumController) para procesar y guardar la imagen.


use Illuminate\Support\Facades\Storage;

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que se cargue una imagen y que sea válida
        // Otros campos del formulario
    ]);

    $album = new Album();
    $album->title = $request->title;

    // Procesar y guardar la imagen
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('albums'); // Guardar la imagen en el directorio "albums"
        $album->image = $imagePath;
    }

    $album->save();
    return redirect()->route('albums.index')->with('success', 'Álbum creado correctamente.');
}

public function update(Request $request, Album $album)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que se cargue una imagen y que sea válida
        // Otros campos del formulario
    ]);

    $album->title = $request->title;

    // Procesar y actualizar la imagen
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($album->image) {
            Storage::delete($album->image);
        }
        $imagePath = $request->file('image')->store('albums'); // Guardar la nueva imagen en el directorio "albums"
        $album->image = $imagePath;
    }

    $album->save();
    return redirect()->route('albums.index')->with('success', 'Álbum actualizado correctamente.');
}

// Paso 3: Mostrar la imagen en la vista de detalle del álbum

// Para mostrar la imagen en la vista de detalle del álbum (show.blade.php), puedes usar el siguiente código:



@if ($album->image)
    <img src="{{ asset('storage/' . $album->image) }}" alt="Imagen del álbum">
@else
    <p>No hay imagen disponible</p>
@endif

// Asegúrate de que APP_URL en tu archivo .env esté configurado correctamente y de 
// que la configuración de almacenamiento de Laravel esté apuntando al directorio correcto.
// Con estos cambios, deberías poder permitir la subida de imágenes miniaturizadas para álbumes en Laravel.