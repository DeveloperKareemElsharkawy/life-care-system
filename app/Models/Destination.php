<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'client_destinations';

    protected $fillable = [
        'from_where',
        'to_where',
        'price',
        'client_id',
    ];
}
