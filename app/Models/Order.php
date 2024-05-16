<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pile(){
        return $this->belongsTo(Pile::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
