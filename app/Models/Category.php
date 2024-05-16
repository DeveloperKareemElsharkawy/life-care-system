<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name','price','code','image' ,'color', 'status','parent_id'];

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


    // Define a relationship to get the parent category
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define a relationship to get the child categories
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function doctorProfitPercentages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DoctorProfitPercentage::class);
    }

}
