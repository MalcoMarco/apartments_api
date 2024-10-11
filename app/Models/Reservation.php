<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Reservation",
 *     type="object",
 *     title="Reservation",
 *     description="Modelo de Reservaciones",
 *     @OA\Property( property="id", type="number", description="ID" ),
 *     @OA\Property( property="date", type="string", description="date reservation" ),
 *     @OA\Property( property="name", type="string", description="name customer" ),
 *     @OA\Property( property="card_id",  type="string", description="ID card" ),
 *     @OA\Property( property="address", type="string", description="address" ),
 *     @OA\Property( property="telephone", type="string", description="telephone" ),
 *     @OA\Property( property="email", type="string", description="email" ),
 *     @OA\Property( property="currancy_exchange_rate", type="number", description="currancy exchange rate" ),
 * )
 */
class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "card_id",
        "address",
        "telephone",
        "email",
        "currancy_exchange_rate"
    ];
}
