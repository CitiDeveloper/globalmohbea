<?php

// app/Models/Location.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    protected $fillable = [
        'tour_id',
        'name',
        'description',
        'latitude',
        'longitude'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}