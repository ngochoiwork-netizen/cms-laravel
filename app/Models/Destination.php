<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'province_id',

        'slug',

        'thumbnail_id',
        'banner_id',
        'og_image_id',

        'latitude',
        'longitude',

        'best_time_to_visit',

        'travel_styles',

        'region',

        'excerpt',

        'canonical_url',

        'is_featured',
        'is_active',

        'sort_order',

        'view_count',
    ];

    protected $casts = [
        'travel_styles' => 'array',

        'is_featured' => 'boolean',
        'is_active' => 'boolean',

        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
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

    public function translations()
    {
        return $this->hasMany(DestinationTranslation::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->translations
            ->where('locale', $locale)
            ->first();
    }

    public function getNameAttribute()
    {
        return optional(
            $this->translation()
        )->name;
    }

    public function getShortDescriptionAttribute()
    {
        return optional(
            $this->translation()
        )->short_description;
    }

    public function getDescriptionAttribute()
    {
        return optional(
            $this->translation()
        )->description;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}