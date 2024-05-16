<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pile extends Model
{
    use HasFactory;

    protected $fillable = [
        'pile_id',
        'name_ar',
        'name_en',
        'content_ar',
        'content_en',
        'image',
        'video',
        'status',
        'user_id',
        'dead_line',
        'event_date',
        'pile_type_id',
    ];

    protected $appends = ['imageUrl','videoUrl'];



    /**
     * Appends Admin Image Url
     *
     */
    public function getImageUrlAttribute($value): string
    {
        return asset('storage/' . $this->image);
    }

    public function getVideoUrlAttribute($value): string
    {
        return asset('storage/' . $this->video);
    }


    public function pile_clients(){
        return $this->hasMany(PileUser::class);
    }

    public function messages(){
        return $this->hasMany(PileMessage::class);
    }

    public function clients(){
        return $this->belongsToMany(User::class,'pile_users');
    }

    public function PileClients(){
        return $this->hasMany(PileUser::class);
    }

    public function pileType(){
        return $this->belongsTo(PileType::class,'pile_type_id');
    }

    public function folders(){
        return $this->belongsToMany(Folder::class,'pile_folders');
    }
}
