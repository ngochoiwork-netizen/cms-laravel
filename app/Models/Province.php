<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Province extends Model
{
    protected $fillable = [
        'country_id',
        'slug',
        'code',
        'thumbnail_id',
        'banner_id',
        'view_count',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'view_count' => 'integer',
        'sort_order' => 'integer',
    ];

    protected static function booted()
    {
        static::saving(function ($province) {
            if (empty($province->slug)) {
                $name = optional($province->translations()->first())->name;
                $province->slug = Str::slug($name ?: 'province-' . time());
            }
        });
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function translations()
    {
        return $this->hasMany(ProvinceTranslation::class);
    }

    public function translation($localeId = null)
    {
        $localeId = $localeId ?: optional(Locale::where('is_default', true)->first())->id;

        return $this->hasOne(ProvinceTranslation::class)
            ->where('locale_id', $localeId);
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
}