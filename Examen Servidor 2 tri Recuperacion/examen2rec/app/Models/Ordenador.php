<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenador extends Model
{
    use HasFactory;

    protected $table = 'ordenadores';

    protected $fillable = ['marca', 'modelo', 'aula_id'];

    public function dispositivos()
    {
        return $this->morphMany(Dispositivo::class, 'colocable');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function cambios()
    {
        return $this->hasMany(Cambio::class);
    }
}
