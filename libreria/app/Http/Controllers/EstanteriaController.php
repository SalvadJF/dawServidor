<?php

namespace App\Http\Controllers;

use App\Models\Estanteria;
use Illuminate\Http\Request;

class EstanteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estanterias = Estanteria::all();
        return view("estanterias.index", compact("estanterias"));
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
    public function show(Estanteria $estanteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estanteria $estanteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estanteria $estanteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estanteria $estanteria)
    {
        //
    }
}
