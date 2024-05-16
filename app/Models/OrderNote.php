<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'admin_id',
        'note',
        'note_date',
        'created_at',
        'updated_at'
    ];


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
