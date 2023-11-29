<?php

namespace App\Generico;
use App\Models\Articulo;

class lineas
{
    private Articulo $articulos;
    private int $cantidad;

    public function __construct(Articulo $articulos, int $cantidad = 1)
    {
        $this->articulos = $articulos;
        $this->cantidad = $cantidad;
    }

    public function getArticulos(): Articulo
    {
        return $this->articulos;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function incrCantidad()
    {
        $this->cantidad++;
    }

    public function decrCantidad()
    {
        $this->cantidad--;
    }


}
