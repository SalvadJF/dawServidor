<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Cambio;
use App\Models\Ordenador;
use Illuminate\Http\Request;

class OrdenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ordenadores.index', [
            'ordenadores' => Ordenador::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenadores.create', [
            'aulas' => Aula::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|max:255',
            'modelo' => 'required|max:255',
            'aula_id' => 'required|string',
        ]);

        $ordenador = new Ordenador();
        $ordenador->marca = $validated['marca'];
        $ordenador->modelo = $validated['modelo'];
        $ordenador->aula_id = $validated['aula_id'];
        $ordenador->save();

        session()->flash('success', 'El ordenador se creado correctamente.');
        return redirect()->route('ordenadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordenador $ordenadore)
    {
        return view('ordenadores.show', [
            'ordenadore' => $ordenadore,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordenador $ordenadore)
    {
        return view('ordenadores.edit', [
            'ordenadore' => $ordenadore,
            'aulas' => Aula::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordenador $ordenador)
    {
        $validated = $request->validate([
            'marca' => 'required|max:255',
            'modelo' => 'required|max:255',
            'aula_id' => 'required|string',
        ]);

        $ordenador->update($validated);
        return redirect()->route('ordenadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenador $ordenadore)
    {
        $ordenadore->delete();
        return redirect()->route('ordenadores.index');
    }

    public function trasladar(Ordenador $ordenadore)
    {
        return view('ordenadores.trasladar', [
            'ordenadore' => $ordenadore,
            'aulas' => Aula::all(),
        ]);
    }

    public function cambiar(Request $request, Ordenador $ordenador)
    {
        $validated = $request->validate([
            'aula_id' => 'required',
        ]);

        $cambio = new Cambio();

        $cambio->ordenador_id = $ordenador->id;
        $cambio->origen_id = $ordenador->aula_id;
        $cambio->destino_id = $validated['aula_id'];

        $cambio->save();
        $ordenador->update($validated);

        return redirect()->route('ordenadores.index');

    }
}
