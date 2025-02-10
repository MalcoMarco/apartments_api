<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Apartment",
 *     type="object",
 *     title="Apartment",
 *     description="Modelo de apartamento",
 *     @OA\Property(
 *          property="apartament_id", type="string", description="ID del apartamento"
 *     ),
 *     @OA\Property(
 *         property="level", type="integer", description="Level"
 *     ),
 *     @OA\Property(
 *         property="square_meters", type="number", description="metros cuadrados"
 *     ),
 *     @OA\Property(
 *         property="price",  type="number", description="Precio del apartamento"
 *     ),
 *      @OA\Property(
 *         property="total_amount", type="number", description="total amount"
 *     ),
  *     @OA\Property(
 *         property="comments", type="string", description="comments"
 *     )
 * )
 */
class Apartment extends Model
{
    use HasFactory;
    protected $fillable =[
        "level",//integer
        "apartment_id",//string
        "square_meters",//decimal
        "price",//decimal
        "total_amount",//decimal
        "availability_id",//integer
        "comments"//mediumtext
    ];

    public function getRouteKeyName()
    {
        return 'apartment_id';
    }

    /**
     * Get the availability that owns the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function availability()
    {
        return $this->belongsTo(Availability::class, 'availability_id', 'id');
    }
}
