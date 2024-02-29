<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $table = 'videojuegos';

    protected $fillable = ['titulo', 'anyo', 'desarrolladora_id'];

    public function desarrolladora()
    {
        return $this->belongsTo(Distribuidora::class);
    }

    public function posesiones()
    {
        return $this->hasMany(Posesion::class);
    }


}
