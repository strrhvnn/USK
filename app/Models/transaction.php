<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
    

    protected $fillable = [
        'id',
        'customer_id' ,
            'flight_id' ,
            'no_booking' ,
            'total_price' ,
            'total_seat' ,
            'payment_status' ,
        ];
}
