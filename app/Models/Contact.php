<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    protected $appends = [  'name'];

    /**
     * Override Password and encrypt it.
     *
     * @return string
     * @var array<string, string>
     */
    public function getNameAttribute($value): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
