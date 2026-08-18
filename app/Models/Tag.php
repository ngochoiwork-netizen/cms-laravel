<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'slug',
        'thumbnail_id',
        'banner_id',
        'og_image_id',
        'type',
        'canonical_url',
        'robots',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(TagTranslation::class)
            ->where('locale', $locale);
    }

    public function vi()
    {
        return $this->hasOne(TagTranslation::class)
            ->where('locale', 'vi');
    }

    public function en()
    {
        return $this->hasOne(TagTranslation::class)
            ->where('locale', 'en');
    }

    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    public function banner()
    {
        return $this->belongsTo(Media::class, 'banner_id');
    }

    public function ogImage()
    {
        return $this->belongsTo(Media::class, 'og_image_id');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function destinations()
    {
        return $this->morphedByMany(Destination::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function hotels()
    {
        return $this->morphedByMany(Hotel::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function restaurants()
    {
        return $this->morphedByMany(Restaurant::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function attractions()
    {
        return $this->morphedByMany(Attraction::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}