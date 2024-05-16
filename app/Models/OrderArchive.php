<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'images',
        'order_id',
        'file'
    ];

    protected $appends = [
        'fileName'
    ];

    public function getFileNameAttribute(): string
    {
        if ($this->file) {
            return substr($this->file, strrpos($this->file, '/') + 1);
            return 'file' . ' ' . pathinfo($this['file'], PATHINFO_EXTENSION);
            return trans('admin/datatable.file_nom', ['id' => $this['id']]) . ' ' . pathinfo($this['file'], PATHINFO_EXTENSION);
        }
        return '';
    }
}
