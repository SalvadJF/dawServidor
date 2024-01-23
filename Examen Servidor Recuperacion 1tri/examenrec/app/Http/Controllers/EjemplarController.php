<?php

namespace App\Http\Controllers;

use App\Models\Ejemplar;
use Illuminate\Http\Request;

class EjemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejemplar $ejemplar)
    {
        $titulo = $ejemplar->libro->titulo;
        $autor = $ejemplar->libro->autor;
        $prestamo = $ejemplar->prestamo->fecha_hora;

        return view('ejemplares.show', [
            'ejemplar' => $ejemplar,
            'titulo' => $titulo,
            'autor' => $autor,
            'prestamo' => $prestamo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejemplar $ejemplar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ejemplar $ejemplar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejemplar $ejemplar)
    {
        //
    }
}
