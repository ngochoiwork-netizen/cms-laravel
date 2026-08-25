<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(
        Request $request,
        Closure $next,
        string $locale
    ): Response {

        if (!array_key_exists($locale, config('languages.supported', []))) {
            abort(404);
        }

        app()->setLocale($locale);

        session([
            'locale' => $locale
        ]);

        return $next($request);
    }
}