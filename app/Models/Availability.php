<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Availability",
 *     type="object",
 *     title="Availability",
 *     description="Modelo de Availability",
 *     @OA\Property(property="id", type="integer", description="ID del Availability"),
 *     @OA\Property(property="name", type="string", description="name Availability"),
 * )
 */
class Availability extends Model
{
    use HasFactory;
    protected $fillable =[
        "name"
    ];

    /**
     * Get all of the apartments for the Availability
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'availability_id', 'id');
    }
}
