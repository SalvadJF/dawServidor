<?php 

// Modificacion Update

public function update(Request $request, int $id)
{
    $pelicula = Pelicula::find($id);
    $pelicula->titulo = $request->input('titulo');
    if ($pelicula->hasEntradas()) {
        return redirect()->back()->with('error', 'No se puede modificar una película para la que se han vendido entradas');
    } else {
        $pelicula->save();
        session()->flash('success', 'La pelicula se ha actualizado correctamente');
    }
    

    return redirect()->route('peliculas.index');
}

// Modificacion Store

public function store(Request $request)
{
    $pelicula = new Pelicula();
    $pelicula->titulo = $request->input('titulo');
    if ($pelicula->hasEntradas()) {
        return redirect()->back()->with('error', 'La pelicula ya existe');
    } else {
    $pelicula->save();
    session()->flash('success', 'La pelicula se ha creado correctamente');
    }
    return redirect()->route('peliculas.index');
}

// modificacion Destroy

public function destroy(int $id)
{
    $pelicula = Pelicula::find($id);
    if ($pelicula->hasEntradas()) {
        return redirect()->back()->with('error', 'No se puede eliminar una película para la que se han vendido entradas');
    } else {
    $pelicula->delete();
    session()->flash('success', 'La pelicula se ha borrado correctamente');
    }
    return redirect()->route('peliculas.index');
}