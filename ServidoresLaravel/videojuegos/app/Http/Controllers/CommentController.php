<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function create()
    {
        return view('pruebas.guardar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string',
            'commentable_type' => 'required|string|in:Post,Image',
            'commentable_id' => 'required|integer',
        ]);

        // Crear el comentario
        $comment = Comment::create([
            'nombre' => $request->input('nombre'),
            'comentable_type' => $request->input('commentable_type'), // Asignar el tipo de comentario
            'comentable_id' => $request->input('commentable_id')
        ]);

        // Asociar el comentario con el modelo destino
        $commentableType = $request->input('commentable_type');
        $commentableId = $request->input('commentable_id');

        if ($commentableType === 'Post') {
            $post = Post::find($commentableId);
            $post->coments()->save($comment);
        } elseif ($commentableType === 'Image') {
            $image = Image::find($commentableId);
            $image->coments()->save($comment);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
