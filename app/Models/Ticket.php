<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'service_type',
        'equipment_id',
        'user_id',
        'assigned_to',
        'resolved_at',
        'resolution_notes',
        'additional_field_1', // Nuevo campo adicional
        'additional_field_2'  // Otro campo adicional
    ];

    protected $casts = [
        'resolved_at' => 'datetime'
    ];

    // Relación con el equipo
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    // Relación con el usuario que reporta
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el técnico asignado
    public function technician()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
