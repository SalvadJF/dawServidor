<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;

class VideojuegoController extends Controller
{
    public function index()
    {
        $videojuegos = Videojuego::all();
        return view('videojuegos.index', ['videojuegos' => $videojuegos]);
    }

    public function create()
    {
        return view('videojuegos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'anyo' => 'required|integer',
            'desarrolladora_id' => 'required|exists:desarrolladoras,id'
        ]);

        Videojuego::create($request->all());

        return redirect()->route('videojuegos.index')
            ->with('success', 'Videojuego creado correctamente.');
    }

    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', ['videojuego' => $videojuego]);
    }

    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.edit', ['videojuego' => $videojuego]);
    }

    public function update(Request $request, Videojuego $videojuego)
    {
        $request->validate([
            'titulo' => 'required',
            'anyo' => 'required|integer',
            'desarrolladora_id' => 'required|exists:desarrolladoras,id'
        ]);

        $videojuego->update($request->all());

        return redirect()->route('videojuegos.index')
            ->with('success', 'Videojuego actualizado correctamente.');
    }

    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();

        return redirect()->route('videojuegos.index')
            ->with('success', 'Videojuego eliminado correctamente.');
    }
}
