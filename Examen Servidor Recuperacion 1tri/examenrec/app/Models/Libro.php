<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Libro extends Model
{
    use HasFactory;

    public function ejemplares(): HasMany
    {
        return $this->hasMany(Ejemplar::class);
    }

    public function prestamos()
    {

        return $this->hasManyThrough(Ejemplar::class, Prestamo::class);
    }

}
