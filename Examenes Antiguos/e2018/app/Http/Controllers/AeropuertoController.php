<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAeropuertoRequest;
use App\Http\Requests\UpdateAeropuertoRequest;
use App\Models\Aeropuerto;

class AeropuertoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aeropuertos.index', [
            'aeropuertos' => Aeropuerto::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aeropuertos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAeropuertoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aeropuerto $aeropuerto)
    {
        return view('aeropuertos.show', [
            'aeropuerto' => $aeropuerto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aeropuerto $aeropuerto)
    {
        return view('aeropuertos.edit', [
            'aeropuerto' => $aeropuerto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAeropuertoRequest $request, Aeropuerto $aeropuerto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aeropuerto $aeropuerto)
    {
        $aeropuerto->delete();
        session()->flash('success', 'El aeropuerto se ha eliminado correctamente.');

        return redirect()->route('aeropuertos.index');
    }
}
