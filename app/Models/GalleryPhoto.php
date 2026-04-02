<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GalleryPhoto extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['gallery_album_id', 'caption', 'order'];

    protected $casts = [
        'caption' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function galleryAlbum()
    {
        return $this->belongsTo(GalleryAlbum::class);
    }

    public function getTranslatedCaptionAttribute()
    {
        return $this->caption[app()->getLocale()] ?? $this->caption['en'] ?? '';
    }
}
