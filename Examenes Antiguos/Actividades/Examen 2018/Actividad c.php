<?php 

// Crear la reserva. El usuario podrá elegir un número de asiento si este está libre

/*
1. Modificar el modelo Reservation

Agrega un campo para almacenar el número de asiento seleccionado por el 
usuario en la tabla de reservas. Puedes llamar a este campo seat_number.

*/

// database/migrations/create_reservations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained()->onDelete('cascade');
            $table->string('seat_number')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

/*
2. Actualizar la vista de reserva

En la vista donde el usuario realiza la reserva, agrega un campo para que el usuario pueda seleccionar el número de asiento. 
Asegúrate de que el número de asiento esté disponible antes de mostrarlo al usuario.

3. Validar el número de asiento

En el controlador ReservationController, antes de crear la reserva, valida que el número de asiento seleccionado esté disponible.
 Puedes hacer esto verificando si ese número de asiento ya está reservado para ese vuelo.

*/

// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request, Flight $flight)
    {
        $request->validate([
            'seat_number' => 'nullable|unique:reservations,seat_number,NULL,id,flight_id,' . $flight->id,
        ], [
            'seat_number.unique' => 'El asiento seleccionado ya está reservado.',
        ]);

        // Lógica para realizar la reserva
    }
}

/*
4. Crear la reserva

Si el número de asiento seleccionado por el usuario está disponible, 
crea la reserva asociada al vuelo con el número de asiento seleccionado.
*/