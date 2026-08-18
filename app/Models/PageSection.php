<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page_id',
        'key',
        'type',
        'layout',
        'image_id',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function translations()
    {
        return $this->hasMany(PageSectionTranslation::class);
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    public function translate($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->translations
            ->where('locale', $locale)
            ->first();
    }
}