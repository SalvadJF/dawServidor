<?php 

// En canciones/create y canciones/update, diseñar una UI (preferentemente mediante Liveware) 
// que permita incorporar con facilidad la canción a uno o varios álbumes sobre la marcha

// Paso 1: Preparar el componente Livewire

// Crea un componente Livewire para manejar la lógica de incorporar la canción a los álbumes. 
// Por ejemplo, podrías llamar a este componente AddSongToAlbums.



php artisan make:livewire AddSongToAlbums

// Paso 2: Modificar la vista canciones/create.blade.php

// Dentro de esta vista, incluye el componente Livewire y pásale cualquier dato necesario para su funcionamiento. 
// En este caso, necesitarás pasar una lista de álbumes disponibles para seleccionar.

html

@extends('layouts.app')

@section('content')
    <h1>Crear Canción</h1>

    <livewire:add-song-to-albums :albums="$albums" />
@endsection

// Paso 3: Modificar la vista canciones/edit.blade.php

// Haz lo mismo que en la vista de creación, pero asegúrate de pasar también los álbumes asociados a la canción que se está editando.

html

@extends('layouts.app')

@section('content')
    <h1>Editar Canción</h1>

    <livewire:add-song-to-albums :albums="$albums" :song="$song" />
@endsection

// Paso 4: Implementar la lógica en el componente Livewire

// En el componente AddSongToAlbums, implementa la lógica para agregar la canción a uno o varios álbumes. 
// Puedes usar selección múltiple para permitir al usuario seleccionar varios álbumes.

php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Album;
use App\Models\Song;

class AddSongToAlbums extends Component
{
    public $albums;
    public $selectedAlbums = [];
    public $song;

    public function mount($albums, $song = null)
    {
        $this->albums = $albums;
        $this->song = $song;

        if ($song) {
            $this->selectedAlbums = $song->albums()->pluck('id')->toArray();
        }
    }

    public function save()
    {
        // Agregar la canción a los álbumes seleccionados
        if ($this->song) {
            $this->song->albums()->sync($this->selectedAlbums);
        }

        // Otra lógica de guardado si es necesario

        // Redirigir a alguna página después de guardar
        return redirect()->route('canciones.index');
    }

    public function render()
    {
        return view('livewire.add-song-to-albums');
    }
}

// Paso 5: Crear la vista del componente Livewire

// Crea una vista para el componente Livewire donde puedas mostrar los álbumes disponibles y permitir
//  al usuario seleccionar los álbumes a los que desea agregar la canción.

html

<div>
    <h2>Seleccionar álbumes</h2>
    <form wire:submit.prevent="save">
        @foreach($albums as $album)
            <label>
                <input type="checkbox" wire:model="selectedAlbums" value="{{ $album->id }}">
                {{ $album->title }}
            </label>
        @endforeach

        <button type="submit">Guardar</button>
    </form>
</div>

// Paso 6: Registrar el componente Livewire en la vista

// En la vista canciones/create.blade.php y canciones/edit.blade.php, agrega el siguiente código para registrar
//  y cargar el componente Livewire.

html

@livewireStyles
@livewireScripts