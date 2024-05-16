<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'user_id',
        'folder_type',
    ];


    public function piles(){
       return  $this->belongsToMany(Pile::class,'pile_folders');
    }
}
