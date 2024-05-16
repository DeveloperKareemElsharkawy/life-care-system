<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PileNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'body',
        'pile_id',
    ];

    public function pile(){
        return $this->belongsTo(Pile::class);
    }
}
