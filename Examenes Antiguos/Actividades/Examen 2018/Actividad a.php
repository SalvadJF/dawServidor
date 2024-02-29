<?php

//  Impedir que se puedan hacer reservas de un vuelo si no hay plazas libres suficientes.

/* 
Ejemplo de migración para la tabla de vuelos

php

 database/migrations/create_flights_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('origin_airport', 3);
            $table->string('destination_airport', 3);
            $table->string('airline');
            $table->dateTime('departure_datetime');
            $table->dateTime('arrival_datetime');
            $table->integer('total_seats');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
}

Estructura del modelo Flight

php

 app/Models/Flight.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'code',
        'origin_airport',
        'destination_airport',
        'airline',
        'departure_datetime',
        'arrival_datetime',
        'total_seats',
        'price',
    ];

    Relación con las reservas
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

Implementación básica de FlightController

php

 app/Http/Controllers/FlightController.php

namespace App\Http\Controllers;

use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function show(Flight $flight)
    {
        return view('flights.show', compact('flight'));
    }
}

Implementación básica de ReservationController

php

app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request, Flight $flight)
    {
        Lógica para realizar la reserva
    }
}
*/

/* Para lograr el objetivo A de impedir que se puedan hacer reservas de un vuelo si no hay plazas libres suficientes, puedes agregar una validación en el controlador de reservas antes de realizar la reserva. Aquí te muestro cómo puedes hacerlo:

En el controlador ReservationController, dentro del método store, puedes verificar si hay suficientes plazas disponibles en el vuelo antes de crear una nueva reserva. Si no hay suficientes plazas disponibles, puedes mostrar un mensaje de error y redireccionar al usuario a la página anterior.

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
        // Verificar si hay suficientes plazas disponibles
        if ($flight->availableSeats() < 1) {
            return redirect()->back()->with('error', 'No hay plazas disponibles para este vuelo.');
        }

        // Lógica para realizar la reserva
    }
}

/* En el modelo Flight, puedes agregar un método para calcular las plazas disponibles 
restando el número total de plazas menos el número de reservas realizadas para ese vuelo:
*/

// app/Models/Flight.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'code',
        'origin_airport',
        'destination_airport',
        'airline',
        'departure_datetime',
        'arrival_datetime',
        'total_seats',
        'price',
    ];

    // Relación con las reservas
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Método para calcular las plazas disponibles
    public function availableSeats()
    {
        return $this->total_seats - $this->reservations()->count();
    }
}
