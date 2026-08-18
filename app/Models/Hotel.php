<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'country_id',
        'province_id',
        'destination_id',
        'slug',
        'thumbnail_id',
        'banner_id',
        'og_image_id',
        'hotel_type',
        'star_rating',
        'price_from',
        'price_range',
        'rating',
        'review_count',
        'phone',
        'email',
        'website',
        'booking_url',
        'affiliate_url',
        'address',
        'latitude',
        'longitude',
        'google_map_embed',
        'amenities',
        'canonical_url',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'amenities' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(HotelTranslation::class);
    }

    public function translation($locale = 'vi')
    {
        return $this->hasOne(HotelTranslation::class)->where('locale', $locale);
    }

    public function vi()
    {
        return $this->hasOne(HotelTranslation::class)->where('locale', 'vi');
    }

    public function en()
    {
        return $this->hasOne(HotelTranslation::class)->where('locale', 'en');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
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

    public function media()
    {
        return $this->morphToMany(Media::class, 'mediaable')
            ->withPivot(['type', 'sort_order'])
            ->withTimestamps();
    }

    public function galleryImages()
    {
        return $this->media()
            ->wherePivot('type', 'gallery')
            ->orderByPivot('sort_order');
    }
} 