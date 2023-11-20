<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Articulo extends Model
{
    use HasFactory;

    /**
     * Atributos  de asigancion masiva
     */

    protected $fillable = ['denominacion', 'precio', 'categoria_id'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
