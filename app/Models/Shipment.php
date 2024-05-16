<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'start_date',
        'start_time',
        'vehicle_id',
        'trailer_id',
        'client_id',
        'driver_id',
        'destination_id',
        'cargo_weight',
        'pocket_money',
        'total_shipment_cost',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
     ];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function trailer()
    {
        return $this->belongsTo('App\Models\Trailer');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function destination()
    {
        return $this->belongsTo('App\Models\Destination');
    }


    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
}
