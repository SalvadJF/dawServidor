<?php 

/*
Crear el componente Livewire:

Ejecuta el siguiente comando para crear un componente Livewire llamado DesarrolladorasDropdown:

php artisan make:livewire DesarrolladorasDropdown

Esto creará un archivo PHP en el directorio app/Http/Livewire.

Implementar la lógica en el componente Livewire:

Abre el archivo app/Http/Livewire/DesarrolladorasDropdown.php y añade la lógica para filtrar las desarrolladoras según la distribuidora seleccionada:

*/
php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Distribuidora;

class DesarrolladorasDropdown extends Component
{
    public $distribuidoraId;
    public $desarrolladoras;

    public function render()
    {
        $this->desarrolladoras = Distribuidora::find($this->distribuidoraId)->desarrolladoras;
        return view('livewire.desarrolladoras-dropdown');
    }
}

/*
Crear la vista del componente Livewire:

Livewire espera una vista en resources/views/livewire/desarrolladoras-dropdown.blade.php para renderizar el componente. Crea esta vista y define las listas desplegables:
*/
html

<div>
    <label for="distribuidora">Distribuidora</label>
    <select wire:model="distribuidoraId" id="distribuidora">
        <option value="">Selecciona una distribuidora</option>
        @foreach ($distribuidoras as $distribuidora)
            <option value="{{ $distribuidora->id }}">{{ $distribuidora->nombre }}</option>
        @endforeach
    </select>

    <label for="desarrolladora">Desarrolladora</label>
    <select id="desarrolladora">
        <option value="">Selecciona una desarrolladora</option>
        @foreach ($desarrolladoras as $desarrolladora)
            <option value="{{ $desarrolladora->id }}">{{ $desarrolladora->nombre }}</option>
        @endforeach
    </select>
</div>

/*
Actualizar la vista de edición de videojuego:

En la vista videojuegos.edit.blade.php, incluye el componente Livewire recién creado:
*/
html

...
<livewire:desarrolladoras-dropdown />
...
/*
Registrar el componente Livewire en las rutas web:

Abre el archivo routes/web.php y registra el componente Livewire para que pueda ser utilizado en las vistas:
*/
php

use App\Http\Livewire\DesarrolladorasDropdown;

Route::livewire('desarrolladoras-dropdown', DesarrolladorasDropdown::class);