<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        $supported = array_keys(
            config('languages.supported', [])
        );

        if (!in_array($locale, $supported)) {
            abort(404);
        }

        $previousUrl = url()->previous();

        $previousPath = parse_url($previousUrl, PHP_URL_PATH);

        $previousPath = trim($previousPath, '/');

        /*
        |--------------------------------------------------------------------------
        | Remove existing locale prefix
        |--------------------------------------------------------------------------
        */

        foreach ($supported as $supportedLocale) {

            $prefix = config(
                "languages.supported.{$supportedLocale}.prefix"
            );

            if (!$prefix) {
                continue;
            }

            if (
                $previousPath === $prefix ||
                str_starts_with($previousPath, $prefix . '/')
            ) {
                $previousPath = preg_replace(
                    '#^' . preg_quote($prefix, '#') . '/?#',
                    '',
                    $previousPath
                );

                break;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Build destination URL
        |--------------------------------------------------------------------------
        */

        $prefix = config(
            "languages.supported.{$locale}.prefix"
        );

        $path = $previousPath;

        if ($prefix) {
            $path = trim(
                $prefix . '/' . $previousPath,
                '/'
            );
        }

        session([
            'locale' => $locale,
        ]);

        return redirect(
            $path ? url($path) : url('/')
        );
    }
}