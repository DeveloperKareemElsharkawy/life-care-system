<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'process_id',
        'status',
        'start_date',
        'end_date',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];



    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function process(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NationalityProcessStep::class, 'process_id');
    }
}
