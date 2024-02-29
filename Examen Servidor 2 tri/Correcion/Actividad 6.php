<?php
/*
Crear un componente Livewire:

Ejecuta el siguiente comando para generar un componente Livewire llamado PoseoVideojuego:

bash

php artisan make:livewire PoseoVideojuego

Esto creará un archivo llamado PoseoVideojuego.php en el directorio app/Http/Livewire.

Definir la lógica en el componente Livewire:

Abre el archivo app/Http/Livewire/PoseoVideojuego.php y define la lógica para manejar las acciones del usuario:

*/
php

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;

class PoseoVideojuego extends Component
{
    public $videojuegos;
    public $videojuegoId;

    public function mount()
    {
        $this->videojuegos = Videojuego::all();
    }

    public function togglePoseo()
    {
        $user = Auth::user();
        $videojuego = Videojuego::find($this->videojuegoId);

        if ($user->poseidos->contains($videojuego)) {
            $user->poseidos()->detach($videojuego);
        } else {
            $user->poseidos()->attach($videojuego);
        }

        $this->emit('videojuegoToggled');
    }

    public function render()
    {
        return view('livewire.poseo-videojuego');
    }
}

/*
Crear la vista del componente Livewire:

Crea un archivo llamado poseo-videojuego.blade.php en el directorio resources/views/livewire y añade el siguiente código:
*/
html

<div>
    <select wire:model="videojuegoId">
        <option value="">Seleccionar videojuego</option>
        @foreach($videojuegos as $videojuego)
            <option value="{{ $videojuego->id }}">{{ $videojuego->titulo }}</option>
        @endforeach
    </select>

    <button wire:click="togglePoseo">Lo tengo</button>
    <button wire:click="togglePoseo">No lo tengo</button>
</div>
/*
Actualizar las rutas:

En el archivo de rutas routes/web.php, define la ruta GET videojuegos/poseo y asigna el componente Livewire a esta ruta:
*/
php

use App\Http\Livewire\PoseoVideojuego;

Route::get('videojuegos/poseo', PoseoVideojuego::class);
/*
Registrar el componente Livewire:

En el archivo resources/views/layouts/app.blade.php, asegúrate de incluir el siguiente código para registrar el componente Livewire:
*/
html

<livewire:scripts />
