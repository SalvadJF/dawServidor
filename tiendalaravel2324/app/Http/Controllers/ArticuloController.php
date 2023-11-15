<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articulos = Articulo::all();
        $categorias = Categoria::all();
        $articulo_categoria = "";

        foreach ($articulos as $articulo) {
            foreach ($categorias as $categoria) {
                if ($articulo->categoria_id == $categoria->id) {
                    $articulo_categoria = $categoria->name;
                }
            }
        }

        return view('articulos.index', [
            'articulos' => $articulos,
            'categorias' => $categorias,
            'articulo_categoria' => $articulo_categoria,
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
        ]);

        $articulo = new Articulo();
        $articulo->nombre = $request->input('nombre');
        $articulo->denominacion = $request->input('denominacion');
        $articulo->precio = $request->input('precio');;
        $articulo->categoria_id = $request->input('categoria');
        $articulo->save();
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
