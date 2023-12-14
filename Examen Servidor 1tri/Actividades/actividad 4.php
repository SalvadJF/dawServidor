<?php 

// Modificacion Update

public function update(Request $request, Pelicula $pelicula)
{
    $validated = $request->validate([
        'titulo' => 'required|max:255',
    ]);
    
    $pelicula->titulo = $request->input('titulo');
    if (isset($pelicula->has('entradas'))) {
        session()->flash('error', 'No se puede modificar una película para la que se han vendido entradas');
    } else {
        $pelicula->save();
        session()->flash('success', 'La pelicula se ha actualizado correctamente');
    }
    

    return redirect()->route('peliculas.index');
}

// Modificacion Store

public function store(Request $request)
{
    $validated = $request->validate([
        'titulo' => 'required|max:255',
    ]);

    $pelicula = new Pelicula();
    $pelicula->titulo = $request->input('titulo');
    if (isset($pelicula->has('entradas'))) {
        session()->flash('error', 'La pelicula ya existe');
    } else {
    $pelicula->save();
    session()->flash('success', 'La pelicula se ha creado correctamente');
    }
    return redirect()->route('peliculas.index');
}

// modificacion Destroy

public function destroy(Pelicula $pelicula)
{
    if (isset($pelicula->has('entradas'))) {
        session()->flash('error', 'No se puede eliminar una película para la que se han vendido entradas');
    } else {
    $pelicula->delete();
    session()->flash('success', 'La pelicula se ha borrado correctamente');
    }
    return redirect()->route('peliculas.index');
}

