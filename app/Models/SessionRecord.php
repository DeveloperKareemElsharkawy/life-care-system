<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SessionRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'main_category_id',
        'category_id',
        'session_price',
        'sessions_count',
        'total',
        'doctor_id',
        'notes',
        'receipt_count',

        'discount_percentage_value',
        'total_sessions_debt_for_company_session',
        'total_sessions_debt_for_client_session',
        'sessions_debt_for_company',
        'sessions_debt_for_client',
    ];

    protected $casts=[
        'date' => 'date'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'main_category_id');
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class,'session_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function attendees(): HasMany
    {
        return $this->hasMany(Attendance::class,'session_record_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Transaction::class,'session_record_id')->where('type','Deposit');
    }
}
