<?php 

// Mostrar una lista con todos los vuelos disponibles, indicando en cada
// uno las plazas libres que quedan. Aplicar paginación, filltrado y ordenación 
// de cada columna de datos.

/*
En el controlador FlightController, 
obtén la lista de vuelos disponibles con el número de plazas libres para cada vuelo. 
Puedes hacer esto usando una consulta en el modelo Flight y calculando las plazas libres usando el método availableSeats()
 que definimos anteriormente.
*/

// app/Http/Controllers/FlightController.php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $flights = Flight::withCount('reservations')
            ->whereRaw('total_seats - reservations_count > 0');

        // Aplicar filtros
        if ($request->has('origin_airport')) {
            $flights->where('origin_airport', $request->input('origin_airport'));
        }

        if ($request->has('destination_airport')) {
            $flights->where('destination_airport', $request->input('destination_airport'));
        }

        // Aplicar ordenación
        $orderBy = $request->input('order_by', 'departure_datetime');
        $orderDirection = $request->input('order_direction', 'asc');
        $flights->orderBy($orderBy, $orderDirection);

        // Aplicar paginación
        $perPage = $request->input('per_page', 10);
        $flights = $flights->paginate($perPage);

        return view('flights.index', compact('flights'));
    }
}