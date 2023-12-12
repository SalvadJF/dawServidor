<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use App\Models\Seccion;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();
        return view("libros.index", [
            "libros" => $libros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Libro $libro)
    {
        return view("libros.create", [
            'autor' => Autor::all(),
            'seccion' => Seccion::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $this->validar($request);
        Libro::create([
            "autor_id" => $validacion['autor_id'],
            "seccion_id" => $validacion["seccion_id"],
            "nombre" => $validacion["nombre"],
        ]);
        if ($validacion) {
            session()->flash("success","El libro se añadido");
        }
        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        $lib = Libro::find($libro);
        return view("libros.show", [
            'libro' => $lib
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view("libros.edit", [
            'libro' => $libro,
            'autor' => Autor::all(),
            'seccion' => Seccion::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $this->validar($request);
        if ($validated) {
            $libro->update($validated);
            session()->flash('success','El libro se a actualizado');
            return redirect()->route('libros.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        session()->flash('success','El libro se ha borrado');
        return redirect()->route('libro.index');
    }

    private function validar(Request $request)
    {
        return $request->validate([
            'autor_id' => 'exist:autor_id',
            'seccion_id' => 'exist:autor_id',
            'nombre' => 'required|max:255',
        ]);
    }
}
