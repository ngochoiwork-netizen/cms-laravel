<?php

use App\Models\Media;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('setting')) {

    function setting($key, $locale = null, $default = null)
    {
        $locale = $locale ?: app()->getLocale();

        $settings = Cache::rememberForever('settings.all', function () {

            return Setting::with('translations')
                ->where('is_active', true)
                ->get()
                ->mapWithKeys(function ($setting) {

                    return [
                        $setting->key => [
                            'type' => $setting->type,

                            'translations' => $setting->translations
                                ->pluck('value', 'locale')
                                ->toArray(),
                        ]
                    ];

                })
                ->toArray();
        });

        if (!isset($settings[$key])) {
            return $default;
        }

        $translations = $settings[$key]['translations'] ?? [];

        return $translations[$locale]
            ?? $translations['vi']
            ?? $default;
    }
}


if (!function_exists('setting_media')) {

    function setting_media($key, $default = null)
    {
        $mediaId = setting($key);

        if (!$mediaId) {
            return $default;
        }

        $media = Media::find($mediaId);

        if (!$media) {
            return $default;
        }

        return $media->url ?? $default;
    }
}