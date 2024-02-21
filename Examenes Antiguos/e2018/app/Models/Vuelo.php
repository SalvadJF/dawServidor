<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $fillable =['codigo', 'compañia aerea', 'salida', 'llegada', 'plazas', 'precio', 'origen', 'destino'];

    public function origenAeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class, 'origen', 'codigo');
    }

    public function destinoAeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class, 'destino', 'codigo');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
