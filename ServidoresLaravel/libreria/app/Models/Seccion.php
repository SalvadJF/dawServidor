<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seccion extends Model
{
    use HasFactory;

    public function libro(): HasMany
    {
        return $this->hasMany(Libro::class);
    }

    public function estanteria(): BelongsTo
    {
        return $this->belongsTo(Estanteria::class);
    }
}
