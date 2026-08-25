<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Media;

class SettingSeoService
{
    /**
     * Bộ SEO mặc định của website theo locale.
     *
     * Dùng cho:
     * - Homepage
     * - Fallback cho Page / Category / Post
     */
    public static function get(?string $locale = null): array
    {
        $locale = $locale ?: app()->getLocale();

        $ogImage = self::resolveImage(
            Setting::getByKey('default_og_image', $locale)
        );

        return [
            'title' => Setting::getByKey(
                'home_meta_title',
                $locale
            ),

            'description' => Setting::getByKey(
                'home_meta_description',
                $locale
            ),

            'keywords' => Setting::getByKey(
                'home_meta_keywords',
                $locale
            ),

            'og_title' => Setting::getByKey(
                'home_meta_title',
                $locale
            ),

            'og_description' => Setting::getByKey(
                'home_meta_description',
                $locale
            ),

            'og_image' => $ogImage,

            'robots' => Setting::getByKey(
                'robots_default',
                $locale
            ) ?: 'index, follow',
        ];
    }

    /**
     * SEO riêng cho Homepage.
     */
    public static function home(?string $locale = null): array
    {
        $locale = $locale ?: app()->getLocale();

        $seo = self::get($locale);

        return array_merge($seo, [
            'locale' => $locale,

            'model_type' => 'home',

            'canonical_url' => null,

            'has_translation' => true,
        ]);

        $seo['schema'] = SchemaService::make($seo);
    }

    /**
     * Chuẩn hóa ảnh SEO thành URL.
     *
     * default_og_image có thể đang lưu:
     * - Media ID
     * - URL
     * - path
     */
    protected static function resolveImage(
        $value
    ): ?string {
        if (!$value) {
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | URL đầy đủ
        |--------------------------------------------------------------------------
        */

        if (
            is_string($value)
            && filter_var($value, FILTER_VALIDATE_URL)
        ) {
            return $value;
        }

        /*
        |--------------------------------------------------------------------------
        | Media ID
        |--------------------------------------------------------------------------
        */

        if (is_numeric($value)) {
            $media = Media::find($value);

            if (!$media) {
                return null;
            }

            return $media->url ?? null;
        }

        /*
        |--------------------------------------------------------------------------
        | Path
        |--------------------------------------------------------------------------
        */

        if (is_string($value)) {
            return asset($value);
        }

        return null;
    }
}