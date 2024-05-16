<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'description_ar',
        'description_en',
        'status',
        'user_id',
        'category_id',
        'pile_id',
        'price',
        'starting_price',
        'price_type',
        'is_required',
        'can_view_quantity',
        'quantity',
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


    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
