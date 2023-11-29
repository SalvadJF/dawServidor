<?php

namespace App\Generico;

use App\Models\Articulo;
use ValueError;

class Carrito
{
    /**
     * @var Lineas[] $lineas
     */
    private array $lineas;

    public function __construct()
    {
        $this->lineas = [];
    }

    public function insertar($id)
    {

        if (!($articulo = Articulo::find($id)))
        {
            throw new ValueError('El articulo no existe');
        }

        if (isset($this->lineas[$id]))
        {
            $this->lineas[$id]->incrCantidad();
        }  else {
            $this->lineas[$id] = new Lineas($articulo);
        }
    }

    public function eliminar($id)
    {
        if (!isset($this->lineas[$id])) {
            throw new ValueError('Articulo inexistente en el carrito');
        }

        $this->lineas[$id]->decrCantidad();
        if ($this->lineas[$id]->getCantidad() == 0) {
            unset($this->lineas[$id]);
        }

    }

    public function vacio(): bool
    {
        return empty($this->lineas);
    }

    public function getLineas(): array
    {
        return $this->lineas;
    }
}
