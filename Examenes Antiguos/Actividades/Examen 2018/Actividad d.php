<?php 

// Mostrar la lista de reservas de ese usuario de forma que, al pulsar sobre
// una de ellas, se visualizará el detalle de la misma, con todos sus datos .

/*
Crear rutas y métodos en el controlador

En el controlador de reservas, agrega métodos para mostrar la lista de reservas de un usuario y
 para mostrar los detalles de una reserva específica.

*/

// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $reservations = $user->reservations()->with('flight')->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('flight');
        return view('reservations.show', compact('reservation'));
    }