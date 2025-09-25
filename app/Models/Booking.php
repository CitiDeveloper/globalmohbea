<?php

// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $casts = [
        'tour_date' => 'date',
    ];
    protected $fillable = [
        'tour_id',
        'name',
        'email',
        'phone',
        'tour_date',
        'number_of_travellers',
        'special_requests',
        'status'
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
