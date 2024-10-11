<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
