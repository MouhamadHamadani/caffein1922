<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use SoftDeletes, HasSlug, InteractsWithMedia;

    protected $fillable = ['user_id', 'title', 'slug', 'excerpt', 'body', 'is_published', 'published_at'];

    protected $casts = [
        'title' => 'array',
        'excerpt' => 'array',
        'body' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(fn($model) => $model->title['en'] ?? 'post')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->orderByDesc('published_at');
    }

    public function getTranslatedTitleAttribute()
    {
        return $this->title[app()->getLocale()] ?? $this->title['en'] ?? '';
    }

    public function getTranslatedExcerptAttribute()
    {
        return $this->excerpt[app()->getLocale()] ?? $this->excerpt['en'] ?? '';
    }

    public function getTranslatedBodyAttribute()
    {
        return $this->body[app()->getLocale()] ?? $this->body['en'] ?? '';
    }
}
