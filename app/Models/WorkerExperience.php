<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class WorkerExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'country_id',
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


    public function Country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault([
            'name' => ' ',
        ]);
    }

    /**
     * Get the Worker Experience's Start Date.
     *
     * @return Attribute
     */
    public function StartDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    /**
     * Get the Worker Experience's Start Date.
     *
     * @return Attribute
     */
    public function EndDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

}
