<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->query('order', 'titulo');
        $direccion = $request->query('direccion', 'asc');
        $posts = Post::with('comentarios', 'categorias')
            ->orderBy($order, $direccion)
            ->orderBy('titulo')
            ->paginate(10);
        return view('posts.index', [
            'posts' => $posts,
            'direccion' => $direccion,
            'order' => $order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('post.create', [
            'users' => $user,
            'categorias' => Categoria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validar($request);
        Post::create($validated);
        if ($validated) {
            session()->flash('exito', 'El articulo se ha creado correctamente');
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view ('posts.edit', [
            'post' => $post,
            'categorias' => Categoria::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $this->validar($request);
        if ($validated) {
            $post->update($validated);
            session()->flash('exito', 'El post se ha actualizado correctamente');
            return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('exito', 'El post se ha borrado correctamente');
        return redirect()->route('posts.index');
    }

    private function validar(Request $request)
    {
        return $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:2555',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);
    }
}
