<?php

// Aqui señalamos que esto esta y pertenece a los controladores
namespace App\Http\Controllers;

// Aqui señalamos que recursos usaremos
use App\Models\Categoria;
use Illuminate\Http\Request;

// Señalamos que que esto es el controlador der Categoria
class CategoriaController extends Controller
{
/* 
* En la funcion index() solo necesitamos saber en este caso la informacion que tenemos en categorias
* por tanto al hacer una asignacion de categoria => Categoria::all() estamos creando un objeto que contendra
* la informacion de todas las categorias de la base de datos
*/



public function index()
{
    return view('categorias.index', [
        'categorias' => Categoria::all(),
    ]);
    // IMPORTANTE para que esto funcione en resources debe haber una carpeta llamada categorias y dentro el un index.blade.php
}

/*
* Aqui los que hacemos es asignar la funcion create a una direccion que tendremos en la carpeta de vistas
*/

public function create()
{
    return view('categorias.create');
}

/*
* Aqui recogemos los valores para introducir un valor nuevo en la base de datos.
* Importante este recurso va en la ruta del formulario y el recogera al enviar lo datos del formulario
* Debemos validar los datos, ya sera por una funcion externa o directamente a mano por la propia funcion store
*/

public function store(Request $request)
{
    // Validamos que el valor de nombre no debe ser mayor de 255 caracteres
    $validate = $request->validate([
        'nombre' => 'required|max255',
        ]);

    // Creamos un nuevo objeto categoria
    $categoria = new Categoria();
    // Le asigamos el campo nombre a lo que recibamos de la peticion
    $categoria->nombre = $request->input('nombre');
    // Guardamos los cambios
    $categoria->save();
    // Lanzamos el mensaje si se ha creado correctamente
    session()->flash('success','La categoria se ha creado correctamente');
    // Tras el proceso devolvemos al usuario al index
    return redirect()->route('categoria.index');
}

/*
* Aqui creamos la ruta para la funciojn de edit
* solo sera necesario expesificar los datos que necesitemos aqui
* el proceso lo haremos dentro del propio en este caso /categorias/edit
*/
public function edit(Categoria $categoria)
{
    return view('categorias.edit', [
        'categoria' => $categoria,
    ]);

}

/*
* Aqui pondremos los parametros para actualizar datos ya existente dentro de la base de datos
* su funcionalidad es muy similar al del store pero no es necesario crear un objeto nuevo.
*/
public function update(Request $request, Categoria $categoria)
{
    $validate = $request->validate([
        'nombre'=> 'required|max:255',
    ]);

    $categoria->nombre = $request->input('nombre');
    $categoria->save();
    session()->flash('success','Se ha modificado correctamente la categoria');
    return redirect()->route('categorias.index');
}

/*
* Aqui podremos eliminar datos de la base datos
* En este caso al existir la clave de esta tabla en otra no podremos eliminarla a menos 
* Que todos los elementos asociados tambien lo esten.
*/
public function destroy(Categoria $categoria)
{
    // Aqui estamos accediendo a articulos porque en el modelo ya hicimos las relacion de tablas
    if ($categoria->articulos->isEmpty()) {
        $categoria->delete();
    } else {
        session()->flash('error','La categoria tiene articulos');
    }
    return redirect()->route('categorias.index');
}
}