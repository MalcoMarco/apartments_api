<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    
    public function index()
    {
        $models = Reservation::paginate();  // Trae todos los registros del modelo
        return response()->json($models, 200);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|before_or_equal:today|date_format:Y-m-d',
            'name' => 'required|string|max:255',
            'card_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|string|email|max:20',
            'currancy_exchange_rate' => 'required|numeric|',            
        ]);
    
        $item = Reservation::create($validated);
    
        return response()->json([
            "message"=>"Reservation creado exitosamente", 
            "data"=>$item
        ],201);
    }

    
    public function show(Reservation $reservation)
    {
        return response()->json($reservation, 200);
    }


    
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'date' => 'required|date|before_or_equal:today|date_format:Y-m-d',
            'name' => 'required|string|max:255',
            'card_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|string|email|max:20',
            'currancy_exchange_rate' => 'required|numeric|',            
        ]);
        $reservation->update($validated);
        return response()->json([
            "message"=>"Datos actualizados exitosamente", 
            "data"=>$reservation
        ],201);
    }

    
    public function destroy(Reservation $Reservation)
    {
        $Reservation->delete();
        return response()->json(['message' => 'reservacion eliminado exitosamente.'], 200);
    }
}
