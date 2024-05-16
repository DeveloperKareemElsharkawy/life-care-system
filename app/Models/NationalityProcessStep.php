<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NationalityProcessStep extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'order',
        'status',
    ];

    public $translatable = ['title'];


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_processes', 'process_id', 'order_id');
    }
}
