<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Flights extends Model
{
    use HasFactory;

    protected $table = 'flight';

    protected $fillable = [
        'flight_number',
        'departure_airport',
        'arrival_airport',
        'departure_time',
        'arrival_time'
    ];
}
