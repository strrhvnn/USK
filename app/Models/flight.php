<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    use HasFactory;

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected $fillable = [
    'airline_id' ,
        'no_flight' ,
        'departure_city',
        'departure_time' ,
        'departure_date',
        'arrival_city',
        'arrival_time',
        'arrival_date',
        'seat_availability' ,
        'price' ,
    ];
}
