<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posesion extends Model
{
    use HasFactory;

    protected $table = 'posesiones';

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
