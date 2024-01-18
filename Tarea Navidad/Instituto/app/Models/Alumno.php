<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function notas() {

        return $this->hasMany(Nota::class);
    }

    public function notas_por_criterio(){
        return $this->notas()
            ->selectRaw('alumno_id, ccee_id, max(nota) AS nota')
            ->groupBy(['alumno_id', 'ccee_id'])
            ->get();
    }
}
