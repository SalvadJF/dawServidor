<?php


class PeliculaController extends Controller
{
    /**
     * Crea una nueva película.
     *
     */
    public function store(Request $request)
    {
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->input('titulo');
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    /**
     * Lista todas las películas.
     *
     */
    public function index()
    {
        $peliculas = Pelicula::all();

        return view('peliculas.index', compact('peliculas'));
    }

    /**
     * Actualiza una película.
     *
     */
    public function update(Request $request, int $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->titulo = $request->input('titulo');
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    /**
     * Elimina una película.
     *
     */
    public function destroy(int $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->delete();

        return redirect()->route('peliculas.index');
    }
}

/* 
*   Para la creacion de las vistas bastara con recoger las vistas creadas en la tiendalaravel y editarlas para adaptarla
*/