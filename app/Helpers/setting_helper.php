<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('setting')) {

    function setting($key, $locale = null, $default = null)
    {
        $locale = $locale ?: app()->getLocale();

        $settings = Cache::rememberForever(
            'settings.all',
            function () {

                return Setting::with('translations')
                    ->where('is_active', true)
                    ->get()
                    ->keyBy('key');

            }
        );

        $setting = $settings->get($key);

        if (!$setting) {
            return $default;
        }

        return $setting->getValue($locale, $default);
    }
}