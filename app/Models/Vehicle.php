<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vehicle extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gallery',
        'image',
        'model',
        'release_date',
        'horse_power',
        'gas_type',
        'plate_number',
        'vehicle_type_id',
        'car_capital',
        'license_start_date',
        'license_end_date',
        'color',
        'chassis_no',
        'serial_number',

    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'license_start_date' => 'date',
        'license_end_date' => 'date',
    ];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['imageUrl'];

    /**
     * Appends Admin Image Url
     *
     */
    public function getImageUrlAttribute($value): string
    {
        return asset('storage/' . $this->image);
    }

    /**
     * The roles that belong to the user.
     */
    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function owners(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Owner::class, 'vehicle_owners', 'vehicle_id', 'owner_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function owners_percentage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VehicleOwners::class, 'vehicle_id');
    }
}
