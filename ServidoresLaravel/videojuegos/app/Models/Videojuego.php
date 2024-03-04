<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'anyo', 'desarrolladora_id'];

    public function desarrolladora()
    {
        return $this->belongsTo(Desarrolladora::class);
    }

    public function posesiones()
    {
        return $this->hasMany(Posesion::class);
    }
}
