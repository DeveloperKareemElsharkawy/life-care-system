<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'session_id',
        'date',
        'payment',
        'notes',
        'receipt_number',
        'transaction_type',
        'attendance_id',
        'type',
        'admin_id',
        'transaction_type',
        'session_record_id',
    ];

    /**
     * @return BelongsTo
     */
    public function sessionRecord(): BelongsTo
    {
        return $this->belongsTo(SessionRecord::class,'session_record_id');
    }

    /**
     * @return BelongsTo
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
