<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articulos.index', [
            'articulos' => Articulo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|max:255',
            'denominacion' => 'required|max:255',
            'precio' => 'required|numeric|decimal:2|between:-9999.99,9999.99',
            'categoria_id' => 'required|integer|exists:categorias,id'
        ]);

        Articulo::create($request->input());
        return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit' , [
            'articulo' => $articulo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $articulo->nombre = $request->input('nombre');
        $articulo->save();
        return redirect()->route('articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}
