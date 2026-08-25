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

if (!function_exists('localized_route')) {

    function localized_route(
        string $name,
        array $parameters = []
    ): string {

        $locale = app()->getLocale();

        return route(
            $locale . '.' . $name,
            $parameters
        );
    }
}

if (!function_exists('localized_url')) {

    function localized_url(?string $url): string
    {
        if (empty($url) || $url === '#') {
            return '#';
        }

        /*
        |--------------------------------------------------------------------------
        | External URL
        |--------------------------------------------------------------------------
        */

        $host = parse_url($url, PHP_URL_HOST);

        if ($host && $host !== request()->getHost()) {
            return $url;
        }

        /*
        |--------------------------------------------------------------------------
        | Current Locale
        |--------------------------------------------------------------------------
        */

        $locale = app()->getLocale();

        $languages = config('languages.supported', []);

        $defaultLocale = config('languages.default', 'en');


        /*
        |--------------------------------------------------------------------------
        | Parse URL
        |--------------------------------------------------------------------------
        */

        $path = parse_url($url, PHP_URL_PATH) ?? '';

        $query = parse_url($url, PHP_URL_QUERY);

        $fragment = parse_url($url, PHP_URL_FRAGMENT);

        $path = trim($path, '/');


        /*
        |--------------------------------------------------------------------------
        | Remove Existing Locale Prefix
        |--------------------------------------------------------------------------
        */

        foreach ($languages as $language) {

            $prefix = $language['prefix'] ?? null;

            if (!$prefix) {
                continue;
            }

            if (
                $path === $prefix ||
                str_starts_with($path, $prefix . '/')
            ) {
                $path = preg_replace(
                    '#^' . preg_quote($prefix, '#') . '/?#',
                    '',
                    $path
                );

                break;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Add Current Locale Prefix
        |--------------------------------------------------------------------------
        */

        $prefix = $languages[$locale]['prefix'] ?? null;

        if ($locale !== $defaultLocale && $prefix) {

            $path = trim(
                $prefix . '/' . $path,
                '/'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Build URL
        |--------------------------------------------------------------------------
        */

        $result = url($path);

        if ($query) {
            $result .= '?' . $query;
        }

        if ($fragment) {
            $result .= '#' . $fragment;
        }

        return $result;
    }
}

if (!function_exists('localized_html')) {
    function localized_html(?string $html): string
    {
        if (empty($html)) {
            return '';
        }

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();

        $dom->loadHTML(
            '<?xml encoding="utf-8" ?><div id="localized-content">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        libxml_clear_errors();

        $links = $dom->getElementsByTagName('a');

        foreach ($links as $link) {

            $href = trim($link->getAttribute('href'));

            if (empty($href)) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Bỏ qua các link không phải internal link
            |--------------------------------------------------------------------------
            */

            if (
                str_starts_with($href, '#') ||
                str_starts_with($href, 'mailto:') ||
                str_starts_with($href, 'tel:') ||
                str_starts_with($href, 'javascript:') ||
                str_starts_with($href, 'http://') ||
                str_starts_with($href, 'https://') ||
                str_starts_with($href, '//')
            ) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Internal link
            |--------------------------------------------------------------------------
            |
            | Dùng lại localized_url() để toàn bộ website chỉ có
            | một logic xử lý locale URL.
            |
            */

            $link->setAttribute(
                'href',
                localized_url($href)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Lấy lại HTML bên trong wrapper
        |--------------------------------------------------------------------------
        */

        $wrapper = $dom->getElementById('localized-content');

        if (!$wrapper) {
            return $html;
        }

        $result = '';

        foreach ($wrapper->childNodes as $child) {
            $result .= $dom->saveHTML($child);
        }

        return $result;
    }
}
