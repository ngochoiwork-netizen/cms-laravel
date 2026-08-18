<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'slug',

        /*
        |--------------------------------------------------------------------------
        | Media
        |--------------------------------------------------------------------------
        */

        'thumbnail_id',

        'banner_id',

        'og_image_id',

        /*
        |--------------------------------------------------------------------------
        | Template
        |--------------------------------------------------------------------------
        */

        'template',

        /*
        |--------------------------------------------------------------------------
        | SEO
        |--------------------------------------------------------------------------
        */

        'canonical_url',

        'robots',

        /*
        |--------------------------------------------------------------------------
        | Schema
        |--------------------------------------------------------------------------
        */

        'schema_type',

        'schema_data',

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        'is_active',

        'sort_order',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'schema_data' => 'array',

        'is_active' => 'boolean',

        'sort_order' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Translations
    |--------------------------------------------------------------------------
    */

    /**
     * Tất cả bản dịch.
     */
    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }

    /**
     * Bản dịch theo ngôn ngữ hiện tại.
     */
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(PageTranslation::class)
            ->where('locale', $locale);
    }

    /**
     * Bản dịch tiếng Việt.
     */
    public function vi()
    {
        return $this->translation('vi');
    }

    /**
     * Bản dịch tiếng Anh.
     */
    public function en()
    {
        return $this->translation('en');
    }

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    */

    /**
     * Ảnh đại diện.
     */
    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    /**
     * Ảnh banner.
     */
    public function banner()
    {
        return $this->belongsTo(Media::class, 'banner_id');
    }

    /**
     * Ảnh Open Graph.
     */
    public function ogImage()
    {
        return $this->belongsTo(Media::class, 'og_image_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Sections
    |--------------------------------------------------------------------------
    */

    /**
     * Các block nội dung của trang.
     *
     * Ví dụ:
     *
     * Home
     * ├── Hero
     * ├── Features
     * ├── Services
     * ├── Testimonials
     * └── CTA
     */
    public function sections()
    {
        return $this->hasMany(PageSection::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Tiêu đề trang.
     */
    public function getTitleAttribute()
    {
        return optional($this->translation)->title
            ?? optional($this->vi)->title;
    }

    /**
     * Mô tả ngắn.
     */
    public function getShortDescriptionAttribute()
    {
        return optional($this->translation)->short_description
            ?? optional($this->vi)->short_description;
    }

    /**
     * Nội dung trang.
     */
    public function getContentAttribute()
    {
        return optional($this->translation)->content
            ?? optional($this->vi)->content;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Chỉ lấy các trang đang hoạt động.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Kiểm tra trang có đang hoạt động hay không.
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }
}