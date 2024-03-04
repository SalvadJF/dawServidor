<?php

namespace App\Livewire;

use App\Models\Distribuidora;
use Livewire\Component;

class DesarrolladorasLista extends Component
{
    public $distribuidoraId;
    public $desarrolladoras;

    public function render()
    {
        // Obtener las desarrolladoras asociadas a la distribuidora seleccionada
        $distribuidora = Distribuidora::find($this->distribuidoraId);
        $this->desarrolladoras = $distribuidora ? $distribuidora->desarrolladoras : [];

        // Obtener todas las distribuidoras que tienen desarrolladoras asociadas
        $distribuidoras = Distribuidora::has('desarrolladoras')->get();

        return view('livewire.desarrolladoras-lista', [
            'distribuidoras' => $distribuidoras,
            'desarrolladoras' => $this->desarrolladoras,
        ]);
    }
}
