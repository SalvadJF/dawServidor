<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use HasFactory;

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
    public function ejemplar(): BelongsTo
    {
        return $this->belongsTo(Ejemplar::class);
    }
}
