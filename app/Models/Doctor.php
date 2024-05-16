<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'email',
        'mobile',
        'type',
        'profit_percentage',
        'notes',
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
        $imageUrl = asset('storage/' . $this->image);

        // Check if the image exists at the given URL
        if (!file_exists(public_path($imageUrl))) {
            // If the image doesn't exist or is not a valid image, provide a default image URL
            // Replace 'path_to_default_image' with your default image path
            return asset('storage/default-user.jpg');
        }

        return $imageUrl;
    }


    public function doctorProfitPercentages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DoctorProfitPercentage::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'doctor_profit_percentages');
    }

}
