<?php

// app/Models/Tour.php
namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'overview',
        'duration_days',
        'duration_nights',
        'price',
        'featured_image',
        'category_id',
        'is_featured'
    ];

    use HasSlug;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function inclusions(): HasMany
    {
        return $this->hasMany(TourInclusion::class)->where('included',1);
    }
    public function exclusions(): HasMany
    {
        return $this->hasMany(TourInclusion::class)->where('included',0);
    }

    public function itineraryItems(): HasMany
    {
        return $this->hasMany(ItineraryItem::class)->orderBy('day_number');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
}