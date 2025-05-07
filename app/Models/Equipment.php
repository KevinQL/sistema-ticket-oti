<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'brand',
        'model',
        'serial_number',
        'status',
        'office_id',
        'specifications',
        'purchase_date',
        'warranty_expiration'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_expiration' => 'date'
    ];

    // Relación con la oficina
    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    // Relación con tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
