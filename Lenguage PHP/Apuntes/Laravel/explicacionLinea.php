<?php
/*
* Queremos crear un carrito de la compra para nuestra aplicacion, para ello crearemos una clase
* Linea la cual la pondremos dentro de la carpeta app en este caso dentro de una carpeta llamado Generico
*/

/*
* Le decimos al Laravel cual es el espacio que usa la clase Linea
* El Laravel es capaz de trabajar con esa clase
* son necesidad de llamarla especificamente
*/

namespace App\Generico;

// Asignamos los modelos que necesitaremos, en nuestro caso solo es necesario Articulos y ValueError

use App\Models\Articulo;
use ValueError;

Class Linea 
{
    // La clase Linea contendra valores que tomara de la clase articulo
    // Tambien tendra un valor propio llamado $cantidad donde se acumulara la cantidad
    private Articulo $articulo;
    private int $cantidad;

    // Creamos el contructor que tomara el objeto articulo y lo metera en una variable
    // Tambien le asigna un valor por defecto a $cantida
    public function __construct(Articulo $articulo, int $cantidad = 1)
    {
        $this->articulo = $articulo;
        $this->cantidad = $cantidad;
    }

    // Creamos un metodo getter para obtener la informacion de un articulo
    public function getArticulo(): Articulo
    {
        return $this->articulo;
    }

    // Creamos un metodo getter para obtener la informacion de cantidad 
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    // Creamos un metodo para aumentar la cantidad de los articulos
    public function incrCantidad()
    {
        $this->cantidad++;
    }

    // Creamos un metodo para reducir la cantidad de los articulos
    public function decrCantidad()
    {
        $this->cantidad--;
    }
}