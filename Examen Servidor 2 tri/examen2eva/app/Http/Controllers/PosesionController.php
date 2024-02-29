<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePosesionRequest;
use App\Http\Requests\UpdatePosesionRequest;
use App\Models\Posesion;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;

class PosesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarioActual = Auth::user();
        $posesiones = $usuarioActual->posesiones;
        return view('reservas.index', [
            'posesiones' => $posesiones,
            'videojuegos' => Videojuego::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePosesionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Posesion $posesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posesion $posesion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePosesionRequest $request, Posesion $posesion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posesion $posesion)
    {
        //
    }
}
