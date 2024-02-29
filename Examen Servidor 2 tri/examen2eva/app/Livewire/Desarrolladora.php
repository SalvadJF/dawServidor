<?php

namespace App\Livewire;
use App\Models\Desarrolladora;
use Livewire\Component;

class Desarrolladoras extends Component
{
    public function render()
    {
        return view('livewire.desarrolladoras', [
            'desarrolladoras' => Desarrolladora::all()
        ]);
    }
}
