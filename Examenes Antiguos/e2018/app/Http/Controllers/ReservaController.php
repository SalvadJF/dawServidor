<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Reserva;
use App\Models\Vuelo;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = auth()->user()->reservas; // Obtener las reservas del usuario autenticado
        return view('reservas.index', ['reservas' => $reservas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservaRequest $request)
    {
       // Obtener el vuelo para el que se desea hacer la reserva
       $vuelo = Vuelo::findOrFail($request->input('vuelo_id'));

       // Verificar si hay suficientes plazas disponibles para hacer la reserva
       if ($vuelo->plazas <= 0) {
           return redirect()->back()->with('error', 'No hay plazas disponibles para este vuelo.');
       }

       // Verificar si el asiento elegido está disponible
       $asiento = $request->input('asiento');
       if ($this->asientoEstaOcupado($vuelo, $asiento)) {
           return redirect()->back()->with('error', 'El asiento elegido está ocupado.');
       }

       // Si hay suficientes plazas disponibles, crea la reserva
       $reserva = new Reserva();
       $reserva->vuelo_id = $vuelo->id;
       // Otras asignaciones de datos de la reserva
       $reserva->save();

       // Decrementar el número de plazas disponibles para el vuelo
       $vuelo->plazas--;

       // Guardar el vuelo con la nueva cantidad de plazas disponibles
       $vuelo->save();

       return redirect()->back()->with('success', 'Reserva realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', [
            'reserva' => $reserva,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    private function asientoEstaOcupado($vuelo, $asiento)
    {
        // Consultar las reservas para el vuelo dado que coincidan con el asiento
        $reservas = Reserva::where('vuelo_id', $vuelo->id)
                            ->where('asiento', $asiento)
                            ->get();

        // Si no hay reservas que coincidan con el asiento, está libre
        return $reservas->isNotEmpty();
    }
}
