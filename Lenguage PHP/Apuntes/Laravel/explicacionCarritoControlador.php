<?php

namespace App\Http\Controllers;

// Deoendencias Necesarias

use App\Generico\Carrito;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

// Con este controlador de Carrito podremos asignar de forma mas ordenadas la funciones de nuestro carrito

class CarritoController extends Controller
{
    // Creamos la funcion insertar en el controlador
    // La llamada findOrFail lo que hace es buscar el objeto y si no lo encuentra da Error
    public function insertar($id)
    {
        Articulo::findOrFail($id);
        // Asignamos a la variable $carrito el objeto carrito
        $carrito = Carrito::carrito();
        // Inserta la id del objeto
        $carrito->insertar($id);
        // Introduce el valor en la session
        session()->put("carrito", $carrito);
        // redirige a la ruta que tenga el nombre principal
        return redirect()->route("principal");
    }

    // Creamos la funcion vaciar en el controlador
    // Este olvida los valores asociados al corrito de la session usando forget()
    public function vaciar()
    {
        session()->forget("carrito");
        return redirect()->route("principal");
    }
}