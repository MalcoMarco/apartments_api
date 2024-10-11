<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/reservations",
     *     tags={"Reservation"},
     *     summary="Obtener lista de registros",
     *     description="Retorna una lista de registros de Reservation",
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de reservaciones",
     *          @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Reservation") ),
     *             @OA\Property(property="current_page", type="integer", example=1 ),
     *             @OA\Property(property="from", type="integer", example=1),
     *             @OA\Property(property="per_page", type="integer", example=100 ),
     *             @OA\Property(property="to", type="integer", example=10)
     *           )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error del servidor"
     *     )
     * )
     */
    public function index()
    {
        $models = Reservation::paginate();  // Trae todos los registros del modelo
        return response()->json($models, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/reservations",
     *     summary="Crear nueva reservacion",
     *     description="",
     *     tags={"Reservation"},
     *     security={{"sanctum": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *          required={"date", "name", "card_id", "address", "telephone","email","currancy_exchange_rate"},
     *           @OA\Property( property="date", type="string", example="06/10/2023", description="date reservation" ),
     *           @OA\Property( property="name", type="string", example="Michael Jackson", description="name customer" ),
     *           @OA\Property( property="card_id",  type="string", example="99999999", description="ID card" ),
     *           @OA\Property( property="address", type="string", example="Avenida xxx 4500 - Tampa", description="address" ),
     *           @OA\Property( property="telephone", type="string", example="(900) 52-5555", description="telephone" ),
     *           @OA\Property( property="email", type="string", example="xyz@gmail.com", description="email" ),
     *           @OA\Property( property="currancy_exchange_rate", type="number", example="56.00", description="currancy exchange rate" )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="reservacion creado exitosamente",
     *         @OA\JsonContent(
     *           @OA\Property(property="message", type="string", example="Reservation creado exitosamente"),
     *           @OA\Property(property="apartment", type="object", ref="#/components/schemas/Reservation"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Datos inválidos"
     *     )
     * )
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/reservations/{id}",
     *     tags={"Reservation"},
     *     summary="Obtener los detalles",
     *     description="Devuelve la información detallada basado en su ID.",
     *     operationId="getReservationById",
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="id del Reservation",
     *         required=true,
     *         @OA\Schema( type="number" )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(ref="#/components/schemas/Reservation")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Reservation no encontrado"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error del servidor"
     *     )
     * )
     */
    public function show(Reservation $Reservation)
    {
        //
    }


    /**
     * @OA\Put(
     *     path="/api/reservations/{id}",
     *     summary="Actualizar reservacion",
     *     description="Actualizar",
     *     tags={"Reservation"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="id de reservacion",
     *         @OA\Schema(type="number", example="1")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *          required={"date", "name", "card_id", "address", "telephone","email","currancy_exchange_rate"},
     *           @OA\Property( property="date", type="string", example="06/10/2023", description="date reservation" ),
     *           @OA\Property( property="name", type="string", example="Michael Jackson", description="name customer" ),
     *           @OA\Property( property="card_id",  type="string", example="99999999", description="ID card" ),
     *           @OA\Property( property="address", type="string", example="Avenida xxx 4500 - Tampa", description="address" ),
     *           @OA\Property( property="telephone", type="string", example="(900) 52-5555", description="telephone" ),
     *           @OA\Property( property="email", type="string", example="xyz@gmail.com", description="email" ),
     *           @OA\Property( property="currancy_exchange_rate", type="number", example="56.00", description="currancy exchange rate" )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="reservacion actualizado exitosamente",
     *         @OA\JsonContent(
     *           @OA\Property(property="message", type="string", example="Reservation actualizado exitosamente"),
     *           @OA\Property(property="apartment", type="object", ref="#/components/schemas/Reservation"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Datos inválidos"
     *     )
     * )
     */
    public function update(Request $request, Reservation $Reservation)
    {
        //
    }

    /**
     * @OA\Delete(
     *     path="/api/reservations/{id}",
     *     summary="Eliminar reservacion",
     *     description="Eliminar",
     *     tags={"Reservation"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="id de reservacion a eliminar",
     *         @OA\Schema(type="number", example="1")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Reservation eliminado exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="reservacion eliminado exitosamente.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Datos inválidos"
     *     )
     * )
     */
    public function destroy(Reservation $Reservation)
    {
        $Reservation->delete();
        return response()->json(['message' => 'reservacion eliminado exitosamente.'], 200);
    }
}
