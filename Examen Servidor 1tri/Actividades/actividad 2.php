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
     * Busca películas.
     *
     */
    public function search(Request $request)
    {
        $titulo = $request->input('titulo');

        $peliculas = Pelicula::where('titulo', 'like', '%' . $titulo . '%')->get();

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
