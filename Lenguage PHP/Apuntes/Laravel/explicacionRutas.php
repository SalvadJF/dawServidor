<?php 
/*
* La rutas que asignaremos a nuestra aplicacion deven encontrarse en le siguiente sitio
* routes/web.php
*/

// Ruta basica
/*
* En este caso estoy creando la ruta /salva y creando directamente una vista
* La cual contendra los valores que le asigno
* si la ejecutaramos solo veriamos salva en html plano
* al asignarle un nombre, cuando queramos hacer referencia a esta en un futuro
* dentro de la aplicacion bastara con hacer route('salva') y el laravel nos dirif¡gira a esta
*/

use App\Models\Articulo;

Route::view("/salva","salva")->name("salva");

// Ruta get basica
/*
* Esta sera el Home de nuestra pagina al tener la ruta raiz /
* le pasamos una funcion anonima para que dentro de esta ruta se cargen los valores siguientes
* asigna a la valiable articulos el valor de todos los objetos Articulos y hace un join para obtener
* tambien los valores de la tabla IVA para asi tambien tener acceso a ellos
* tambien el carrito esta dentro de este siempre y cuando este lleno
* al usar get los datos seran visibles por lo cual no es recomendado si tiene informacion sensible
*/
Route::get("/", function() {
    return view("principal", [
        'articulos' => Articulo::with(['iva', 'categoria'])->get(),
        'carrito' => carrito(),
    ]);
})->name("principal");

// Ruta get con variables
/*
* En esta ruta  queremos eliminar un articulo, ñlo que hacemos es llamar a la funcion
* del controlador directamente, asignado en la propia ruta la id
* esa id la pondremos en la web para que sea asignable
* Ejemplo de uso
* href="{{ route('carrito.eliminar', $articulo) }}" la id la sacara el laravel automaticamente
* del objeto articulo cuando llamemos a esa ruta
*/
Route::get("carrito/eliminar/{id}", [CarritoController::class, 'eliminar'])
    ->name('carrito.eliminar')->whereNumber('id');

// Ruta post
/*
* cuando tenemos informacion sensible debemos usar post, por ejemplo en la creacion de una factura
* pues contiene tanto informacion de 3 tablas y campos que no deberian ver lo usuarios
*/
Route::post('/realizar_compra', function () {

    // creamos una variable que contiene el carrito
    $carrito = carrito();
    // creamos una transsacion pues es informacion delicada y solo queremos que se introduzca datos si todo es correto
    DB::beginTransaction();
    // creaomos una variable con una nueva instancia del onjeto factura
    $factura = new Factura();
    // asignamos que los datos del usuario sean los del usuario realizando la accion
    $factura->user()->associate(Auth::user());
        // Alternativa:
        // $factura->user_id = Auth::id();
    // guardamos los datos
    $factura->save();

    // creamos un array para contener la informacion del carrito
    $attachs = [];
    // hacemos un bucle para introducir la informacion
    foreach ($carrito->getLineas() as $articulo_id => $linea) {
        $attachs[$articulo_id] = ['cantidad' => $linea->getCantidad()];
    }
    // usamos el metodo attach para meter los objetos en la variable factura
    $factura->articulos()->attach($attachs);
    // cerramos la transsaccion si todo a sido correcto
    DB::commit();
    // mensaje de confirmacion
    session()->flash('success', 'La factura se ha generado correctamente.');
    // se borra el corrito pues ya no es necesario
    session()->forget('carrito');
    // devuelve al usuario a la pagina principal
    return redirect()->route('principal');
})->middleware('auth')->name('realizar_compra');


// Ruta Resource
/*
* Podemos asignar a una ruta los recurso de un objeto
* EJ : Route::resource('articulos', ArticuloController::class); 
* significa que con route('articulo') estamos accediendo a todos las funciones del controlador
* si asignamos un middleware('auth') obligaremos al usuario a registrase si quiere haceder a eso recurso
*/

Route::resource('categorias', CategoriaController::class)
    ->middleware('auth');

// Ruta con datos especificos
/*
* Cuando quremos mucha informacion queesta en muchas tablas lo idoneo es hacer joins
* Para poder acceder a esa informacion desde las vistas debemos hacer estas uniones en la ruta
* usando los metodos necesarios
*/
Route::get('facturas', function () {
    // Esto hace  que automaticamente el usuario solo pueda ver las facturas asociadas a su id
    // IMPORTANTE aunque el VSCode se queje es correcto
    $facturas = Auth::user()->facturas()
        // al usar Raw al final de una peticion podemos meter sql puro,
        // util si no encontramos la forma de hacerlo por Eloquent
        ->selectRaw('facturas.id, facturas.user_id, facturas.created_at, sum(cantidad * precio) as total')
        // join para unir tablas
        ->join('articulo_factura', 'facturas.id', '=', 'articulo_factura.factura_id')
        ->join('articulos', 'articulos.id', '=', 'articulo_factura.articulo_id')
        // groupBy para organizar
        ->groupBy('facturas.id')
        // Para hacer la peticion
        ->get();
    return view('facturas', [
        'facturas' => $facturas,
    ]);
})->middleware('auth')->name('facturas.index');