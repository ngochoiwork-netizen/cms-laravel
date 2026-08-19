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
        'page_id',

        'key',

        'type',

        'layout',

        'image_id',

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
     * Ảnh của section.
     */
    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

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
     * Tiêu đề phụ.
     */
    public function getSubtitleAttribute()
    {
        return optional($this->translation)->subtitle
            ?? optional($this->vi)->subtitle;
    }

    /**
     * Nội dung section.
     */
    public function getContentAttribute()
    {
        return optional($this->translation)->content
            ?? optional($this->vi)->content;
    }

    /**
     * Text của button.
     */
    public function getButtonTextAttribute()
    {
        return optional($this->translation)->button_text
            ?? optional($this->vi)->button_text;
    }

    /**
     * Link của button.
     */
    public function getButtonLinkAttribute()
    {
        return optional($this->translation)->button_link
            ?? optional($this->vi)->button_link;
    }

    /**
     * Dữ liệu mở rộng dạng JSON.
     */
    public function getDataJsonAttribute()
    {
        return optional($this->translation)->data_json
            ?? optional($this->vi)->data_json
            ?? [];
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

    /**
     * Lấy section theo key.
     *
     * Ví dụ:
     *
     * PageSection::key('about')->first();
     */
    public function scopeKey(
        Builder $query,
        string $key
    ): Builder {
        return $query->where('key', $key);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Kiểm tra section có đang hoạt động hay không.
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }
}