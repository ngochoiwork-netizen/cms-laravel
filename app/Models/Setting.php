<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        /*
        |--------------------------------------------------------------------------
        | Group
        |--------------------------------------------------------------------------
        */

        'group',

        /*
        |--------------------------------------------------------------------------
        | Identification
        |--------------------------------------------------------------------------
        */

        'key',

        'label',

        /*
        |--------------------------------------------------------------------------
        | Field Type
        |--------------------------------------------------------------------------
        */

        'type',

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        'is_active',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
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
        return $this->hasMany(SettingTranslation::class);
    }

    /**
     * Bản dịch theo ngôn ngữ hiện tại.
     */
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(SettingTranslation::class)
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
     * Giá trị theo ngôn ngữ hiện tại.
     *
     * Ví dụ:
     *
     * $setting->value
     */
    public function getValueAttribute()
    {
        return optional($this->translation)->value
            ?? optional($this->vi)->value;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Chỉ lấy các setting đang hoạt động.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Lấy setting theo nhóm.
     *
     * Ví dụ:
     *
     * Setting::group('seo')->get();
     */
    public function scopeGroup(
        Builder $query,
        string $group
    ): Builder {
        return $query->where('group', $group);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Lấy giá trị theo key.
     *
     * Ví dụ:
     *
     * Setting::getByKey('phone');
     *
     * Setting::getByKey('facebook_url');
     */
    public static function getByKey(
        string $key,
        ?string $locale = null
    ) {
        $setting = static::query()
            ->where('key', $key)
            ->first();

        if (!$setting) {
            return null;
        }

        return optional(
            $setting->translation($locale)->first()
        )->value;
    }

    /**
     * Kiểm tra setting có đang hoạt động hay không.
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }
}