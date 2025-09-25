<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_name',
        'author_title',
        'rating',
        'is_featured',
        'is_published'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean'
    ];

    public function getStarRatingAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }
}