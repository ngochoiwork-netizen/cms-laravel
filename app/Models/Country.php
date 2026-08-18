<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'code',
        'slug',
        'thumbnail_id',
        'banner_id',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(CountryTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return $this->hasOne(CountryTranslation::class)->where('locale', $locale);
    }

    public function vi()
    {
        return $this->hasOne(CountryTranslation::class)->where('locale', 'vi');
    }

    public function en()
    {
        return $this->hasOne(CountryTranslation::class)->where('locale', 'en');
    }

    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    public function banner()
    {
        return $this->belongsTo(Media::class, 'banner_id');
    }
}