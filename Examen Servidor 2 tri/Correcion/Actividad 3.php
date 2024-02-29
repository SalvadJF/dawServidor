<?php 

public function index()
{
    $user = auth()->user();
    $videojuegos = $user->poseidos()->with('desarrolladora.distribuidora')->get();
    return view('videojuegos.index', ['videojuegos' => $videojuegos]);
}
