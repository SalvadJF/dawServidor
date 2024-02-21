<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $fillable =['nombre', 'codigo'];


    public function vuelos()
    {
        return $this->hasMany(Vuelo::class);
    }
}
