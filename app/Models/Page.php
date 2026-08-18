<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PageTranslation;
use App\Models\Media;
use App\Models\PageSection;

class Page extends Model
{
    protected $fillable = [
        'slug',

        'thumbnail_id',
        'banner_id',
        'og_image_id',

        'template',

        'canonical_url',
        'robots',

        'schema_type',
        'schema_data',

        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'schema_data' => 'array',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(PageTranslation::class)
            ->where('locale', $locale);
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

    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    public function getTitleAttribute()
    {
        return optional($this->translation)->title;
    }

    public function getContentAttribute()
    {
        return optional($this->translation)->content;
    }

    public function sections()
    {
        return $this->hasMany(PageSection::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

}