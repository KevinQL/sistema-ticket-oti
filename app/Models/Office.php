<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'department',
        'description',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    // Relación con equipos
    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }
}
