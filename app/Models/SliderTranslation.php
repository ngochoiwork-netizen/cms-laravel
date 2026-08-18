<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    |
    | Nội dung của slider theo từng ngôn ngữ.
    |
    */

    protected $fillable = [
        'slider_id',

        'locale',

        /*
        |--------------------------------------------------------------------------
        | Content
        |--------------------------------------------------------------------------
        */

        'title',

        'subtitle',

        'description',

        /*
        |--------------------------------------------------------------------------
        | Button
        |--------------------------------------------------------------------------
        */

        'button_text',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Slider gốc.
     *
     * slider_translations.slider_id
     *                ↓
     * sliders.id
     *
     * Ví dụ:
     *
     * $translation->slider
     */
    public function slider()
    {
        return $this->belongsTo(Slider::class);
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