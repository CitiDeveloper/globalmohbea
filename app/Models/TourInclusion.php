<?php

// app/Models/TourInclusion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourInclusion extends Model
{
    protected $fillable = ['tour_id', 'item', 'included'];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}