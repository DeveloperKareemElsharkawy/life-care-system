<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'direct_manager',
        'email',
        'image',
        'primary_mobile_number',
        'secondary_mobile_number',
        'address',
        'three_percent_tax',
        'value_added_tax',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'three_percent_tax' => 'boolean',
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

    public function destinations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Destination::class);
    }

}
