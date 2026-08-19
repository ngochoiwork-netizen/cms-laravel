<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'image_id',

        'link',

        'button_text',

        'position',

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
        return $this->hasMany(SliderTranslation::class);
    }

    /**
     * Bản dịch theo ngôn ngữ hiện tại.
     */
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(SliderTranslation::class)
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
     * Ảnh slider.
     */
    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Tiêu đề theo ngôn ngữ hiện tại.
     */
    public function getTitleAttribute()
    {
        return optional($this->translation)->title
            ?? optional($this->vi)->title;
    }

    /**
     * Tiêu đề phụ theo ngôn ngữ hiện tại.
     */
    public function getSubtitleAttribute()
    {
        return optional($this->translation)->subtitle
            ?? optional($this->vi)->subtitle;
    }

    /**
     * Mô tả theo ngôn ngữ hiện tại.
     */
    public function getDescriptionAttribute()
    {
        return optional($this->translation)->description
            ?? optional($this->vi)->description;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Chỉ lấy slider đang hoạt động.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Lấy slider theo vị trí.
     */
    public function scopePosition(
        Builder $query,
        string $position
    ): Builder {
        return $query->where('position', $position);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Kiểm tra slider có đang hoạt động hay không.
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }
}