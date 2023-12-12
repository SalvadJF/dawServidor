<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class DescriptionController extends Controller
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
    public function create(Pelicula $pelicula)
    {
        return view('descriptions.create', [
            'pelicula' => $pelicula,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $this->validar($request);
        Description::create([
            'pelicula_id' => $validacion['pelicula_id'],
            'descripcion' => $validacion['description'],
        ]);

        return redirect()->route('peliculas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Description $description)
    {
        return view('descriptions.edit', [
            'description' => $description,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Description $description)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Description $description)
    {
        //
    }

    private function validar(Request $request)
    {
        return $request->validate([
            'description' => 'required|max:255',
            'pelicula_id' => 'exists:peliculas,id',
        ]);
    }
}
