<?php
/*
* Queremos crear un carrito de la compra para nuestra aplicacion, para ello crearemos una clase
* la cual la pondremos dentro de la carpeta app en este caso dentro de una carpeta llamado Generico
*/

/*
* Le decimos al Laravel cual es el espacio que usa la clase Carrito
* Dentro de este espacio tambien se encontrara la clase Linea que reprensentara las lineas
* del carrito, al decir que use este namespace El Laravel es capaz de trabajar con esa clase
* son necesidad de llamarla especificamente
*/

namespace App\Generico;

// Asignamos los modelos que necesitaremos, en nuestro caso solo es necesario Articulos y ValueError

use App\Models\Articulo;
use ValueError;

class Carrito
{
    /**
     * @var Linea[] $lineas
     */
    private array $lineas = [];
    // Asignamos a carrito las funciones de Linea y le damos el nombre de $lineas

    // Creamos el constructor que es un array vacio
    public function __construct()
    {
        $this->lineas = [];
    }

    // Creamos la funcion de insertar el objetos el cual se le debe dar un valor $id
    public function insertar($id)
    {
        // Comprobamos su el articulo existe dentro de la base de datos
        if (!($articulo = Articulo::find($id))) {
            throw new ValueError("El articulo no existe");
        }

        // Si el articulo ya esta dentro del carrito le aumentamos la cantidad
        // con una funcion existente dentro de Linea
        if (isset($this->lineas[$id])) {
            $this->lineas[$id]->incrCantidad();
        } else {
        // Si no existe, creamos una nueva Linea dentro del carrito
            $this->lineas[$id] = new Linea($articulo);
        }
    }

    // Creamos la funcion de eliminar articulos del carrito, debe recibir un valor $id
    public function eliminar($id)
    {
        // Si se trata de eliminar un articulo que no existe dara error
        if (!isset($this->lineas[$id])) {
            throw new ValueError("Articulo inexiste en el carrito");
        }

        // Llamamos al metodo de Linea decrCantidad
        $this->lineas[$id]->decrCantidad();
        // Usamos un metodo geter de Linea para saber la cantidad
        // En caso de que la cantidad se reduzca a 0 destruimos la variable que contiene ese dato
        if ($this->lineas[$id]->getCantidad() == 0) {
            unset($this->lineas[$id]);
        }
    }

    // Creamos la funcion vaciar el carrito
    public function vacio(): bool
    {
        return empty($this->lineas);
    }

    // Creamos una funcion getter para sacar la informacion del carrito
    public function getLineas(): array
    {
        return $this->lineas;
    }

    // Creamos la funcion carrito que devuelve el carrito y si no existe en la session lo crea
    public static function carrito()
    {
        if (session()->missing('carrito')) {
            session()->put('carrito', new static());
        }

        return session('carrito');
    } 
}