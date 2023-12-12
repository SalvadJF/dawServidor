<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estanteria extends Model
{
    use HasFactory;

    public function seccion(): HasMany
    {
        return $this->hasMany(Seccion::class);
    }
}
