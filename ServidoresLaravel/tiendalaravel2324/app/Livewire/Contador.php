<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{
    public $contador = 1;

    public function increment()
    {
        $this->contador++;
    }

    public function decrement()
    {
        $this->contador--;
    }

    public function render()
    {
        return view('livewire.contador');
    }
}
