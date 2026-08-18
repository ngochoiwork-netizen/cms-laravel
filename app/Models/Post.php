<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'thumbnail_id',
        'banner_id',
        'og_image_id',
        'slug',
        'excerpt',
        'published_at',
        'canonical_url',
        'robots',
        'schema_type',
        'schema_data',
        'view_count',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'schema_data' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(PostTranslation::class)
            ->where('locale', $locale);
    }

    public function vi()
    {
        return $this->hasOne(PostTranslation::class)
            ->where('locale', 'vi');
    }

    public function en()
    {
        return $this->hasOne(PostTranslation::class)
            ->where('locale', 'en');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}