<?php

namespace App\Livewire;

use App\Models\Distribuidora;
use Livewire\Component;

class Distribuidoras extends Component
{
    public function render()
    {
        return view('livewire.desarrolladoras', [
            'distribuidoras' => Distribuidora::all()
        ]);
    }
}
