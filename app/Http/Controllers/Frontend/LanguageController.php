<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        if (!in_array($locale, ['en', 'vi'])) {
            abort(404);
        }

        session(['locale' => $locale]);

        app()->setLocale($locale);

        return redirect()->back();
    }
}