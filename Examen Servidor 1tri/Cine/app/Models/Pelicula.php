<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = ['titulo'];
    public function proyecciones(): HasMany
    {
        return $this->hasMany(Proyeccion::class);
    }
}
