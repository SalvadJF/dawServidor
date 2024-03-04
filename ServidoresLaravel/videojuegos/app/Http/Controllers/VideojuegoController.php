<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use App\Models\Distribuidora;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideojuegoController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado actualmente
        $user = Auth::user();

        // Obtener las posesiones del usuario con la relación de videojuego cargada
        $posesiones = $user->poseidos()->with('videojuego.desarrolladora')->get();

        // Filtrar las posesiones para excluir aquellas sin videojuego o sin desarrolladora
        $videojuegos = $posesiones->filter(function ($posesion) {
            return $posesion->videojuego !== null && $posesion->videojuego->desarrolladora !== null;
        })->pluck('videojuego');

        // Renderizar la vista 'videojuegos.index' y pasar los videojuegos como una variable llamada 'videojuegos'
        return view('videojuegos.index', ['videojuegos' => $videojuegos]);
    }

    public function create()
    {
        $desarrolladoras = Desarrolladora::all();
        return view('videojuegos.create', [
            'desarrolladoras' => $desarrolladoras
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'anyo' => 'required|integer',
            'desarrolladora_id' => 'required'
        ]);

        Videojuego::create($request->all());
        session()->flash('success', 'El videojuego se ha creado correctamente.');

        return redirect()->route('videojuegos.index');
    }

    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', ['videojuego' => $videojuego]);
    }

    public function edit(Videojuego $videojuego)
    {
        $desarrolladoras = Desarrolladora::all();
        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
            'desarrolladoras' => $desarrolladoras
    ]);
    }

    public function update(Request $request, Videojuego $videojuego)
    {
        $request->validate([
            'titulo' => 'required',
            'anyo' => 'required|integer',
            'desarrolladora_id' => 'required|exists:desarrolladoras,id'
        ]);

        $videojuego->update($request->all());
        session()->flash('success', 'El videojuego se ha editado correctamente.');
        return redirect()->route('videojuegos.index');
    }

    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        session()->flash('success', 'El videojuego se ha eliminado correctamente.');
        return redirect()->route('videojuegos.index');
    }
}
