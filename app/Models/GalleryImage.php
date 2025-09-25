<?php
// app/Models/GalleryImage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    protected $fillable = ['tour_id', 'image_path', 'caption'];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}