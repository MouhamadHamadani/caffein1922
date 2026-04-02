<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'party_size', 'date', 'time_slot', 'notes', 'status'];

    protected $casts = [
        'date' => 'date',
        'time_slot' => 'datetime:H:i',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('date', today());
    }
}
