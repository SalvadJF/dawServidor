<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Http\Requests\UpdateVideojuegoRequest;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class VideojuegoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Videojuego::class, 'videojuego');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('videojuegos.index', [
            'videojuegos' => Videojuego::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideojuegoRequest $request)
    {
        $validated = $request->validated();
        $videojuego = new Videojuego();
        $videojuego->titulo = $request->input('titulo');
        $videojuego->anyo = $request->input('anyo');
        $videojuego->desarrolladora = $request->input('desarrolladora');
        $videojuego->save();
        session()->flash('success', 'El videojuego se ha creado correctamente.');
        return redirect()->route('videojuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', [
            'videojuego' => $videojuego,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        if(!Gate::allows('edit-videojuego', $videojuego)) {
            abort(403);
        }
        else {
        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
        ]);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideojuegoRequest $request, Videojuego $videojuego): RedirectResponse
    {

        $validated = $request->validated();
        $videojuego->titulo = $request->input('titulo');
        $videojuego->anyo = $request->input('anyo');
        $videojuego->desarrolladora = $request->input('desarrolladora');
        $videojuego->save();
        session()->flash('success', 'El videojuego se ha creado correctamente.');
        return redirect()->route('videojuegos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        session()->flash('success', 'La videojuego se ha eliminado correctamente.');

        return redirect()->route('videojuegos.index');
    }
}
