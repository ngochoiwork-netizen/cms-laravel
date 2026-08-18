<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    |
    | Giá trị của Setting theo từng ngôn ngữ.
    |
    */

    protected $fillable = [
        'setting_id',

        'locale',

        'value',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Setting gốc.
     *
     * setting_translations.setting_id
     *                     ↓
     * settings.id
     *
     * Ví dụ:
     *
     * $translation->setting
     */
    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Kiểm tra bản dịch tiếng Việt.
     */
    public function isVietnamese(): bool
    {
        return $this->locale === 'vi';
    }

    /**
     * Kiểm tra bản dịch tiếng Anh.
     */
    public function isEnglish(): bool
    {
        return $this->locale === 'en';
    }
}