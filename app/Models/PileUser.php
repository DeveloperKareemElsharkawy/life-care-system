<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PileUser extends Model
{
    use HasFactory;


    public function client(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function folder(){
        return $this->belongsTo(Folder::class,'folder_id');
    }
}
