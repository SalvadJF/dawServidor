<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Libro extends Model
{
    use HasFactory;

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }
    public function seccion(): BelongsTo
    {
        return $this->belongsTo(Seccion::class);
    }
}
