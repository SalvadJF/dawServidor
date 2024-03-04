<?php

namespace App\Livewire;

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
