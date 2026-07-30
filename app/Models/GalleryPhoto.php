<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit(Fit::Crop, 400, 400)->nonQueued();
        $this->addMediaConversion('display')->fit(Fit::Max, 1200, 1200)->nonQueued();
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
