<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function proyecciones()
    {
        return $this->hasMany(Proyeccion::class);
    }

    public function entradas()
    {
        // return $this->hasManyThrough(Entrada::class, Proyeccion::class);
        return $this->through('proyecciones')->has('entradas');
    }

    public function cantidadEntradas()
    {
        $total = 0;

        foreach ($this->proyecciones as $proyeccion) {
            $total += $proyeccion->entradas->count();
        }

        return $total;
    }
}
