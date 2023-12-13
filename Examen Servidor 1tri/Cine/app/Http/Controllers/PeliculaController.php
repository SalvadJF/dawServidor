<?php

namespace App\Http\Controllers;


use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::all();

        return view('peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->input('titulo');
        if ($pelicula->has(Entradas) {
            return redirect()->back()->with('error', 'La pelicula ya existe');
        } else {
        $pelicula->save();
        session()->flash('success', 'La pelicula se ha creado correctamente');
        }
        return redirect()->route('peliculas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);

        $entradas = DB::table('entradas')
            ->whereIn('proyeccion_id', DB::table('proyecciones')
              ->where('pelicula_id', $pelicula->id)
              ->whereNotNull('id')
              ->select('id')
              ->get()
              ->pluck('id')
            )
            ->count();

        return view('peliculas.show', [
            'pelicula' => $pelicula,
            'entradas' => $entradas,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->titulo = $request->input('titulo');
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->titulo = $request->input('titulo');
        if ($pelicula->hasEntrada()) {
            return redirect()->back()->with('error', 'No se puede modificar una película para la que se han vendido entradas');
        } else {
            $pelicula->save();
            session()->flash('success', 'La pelicula se ha actualizado correctamente');
        }


        return redirect()->route('peliculas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pelicula = Pelicula::find($id);
        if ($pelicula->hasEntrada()) {
            return redirect()->back()->with('error', 'No se puede eliminar una película para la que se han vendido entradas');
        } else {
        $pelicula->delete();
        session()->flash('success', 'La pelicula se ha borrado correctamente');
        }
        return redirect()->route('peliculas.index');
    }
}
