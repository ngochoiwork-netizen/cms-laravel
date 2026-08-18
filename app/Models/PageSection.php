<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        /*
        |--------------------------------------------------------------------------
        | Relations
        |--------------------------------------------------------------------------
        */

        'page_id',

        /*
        |--------------------------------------------------------------------------
        | Identification
        |--------------------------------------------------------------------------
        */

        'section_key',

        'section_type',

        /*
        |--------------------------------------------------------------------------
        | Media
        |--------------------------------------------------------------------------
        */

        'thumbnail_id',

        'background_image_id',

        /*
        |--------------------------------------------------------------------------
        | Display
        |--------------------------------------------------------------------------
        */

        'sort_order',

        'is_active',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'sort_order' => 'integer',

        'is_active' => 'boolean',
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
        return $this->hasMany(PageSectionTranslation::class);
    }

    /**
     * Bản dịch theo ngôn ngữ hiện tại.
     */
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(PageSectionTranslation::class)
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
    | Page
    |--------------------------------------------------------------------------
    */

    /**
     * Trang chứa section.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
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
     * Ảnh nền.
     */
    public function backgroundImage()
    {
        return $this->belongsTo(
            Media::class,
            'background_image_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Tiêu đề section.
     */
    public function getTitleAttribute()
    {
        return optional($this->translation)->title
            ?? optional($this->vi)->title;
    }

    /**
     * Nội dung section.
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
     * Chỉ lấy section đang hoạt động.
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
     * Kiểm tra section có đang hoạt động không.
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }
}