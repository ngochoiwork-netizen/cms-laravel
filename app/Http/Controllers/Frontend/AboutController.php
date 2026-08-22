<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Page;

class AboutController extends Controller
{
    protected array $view = [];

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Page
        |--------------------------------------------------------------------------
        */

        $page = Page::with([
            'translations',
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'about')
            ->firstOrFail();

        $this->view['page'] = $page;

        /*
        |--------------------------------------------------------------------------
        | Hero
        |--------------------------------------------------------------------------
        */

        $heroSection = $page?->sections
            ->where('key', 'hero')
            ->where('is_active', true)
            ->first();

        $this->view['heroSection'] = $heroSection;

        $missionSection = $page?->sections
            ->where('key', 'mission')
            ->where('is_active', true)
            ->first();

        $this->view['missionSection'] = $missionSection;

        $valuesSection = $page?->sections
            ->where('key', 'values')
            ->where('is_active', true)
            ->first();

        $this->view['valuesSection'] = $valuesSection;


        $workflowSection = $page?->sections
            ->where('key', 'workflow')
            ->where('is_active', true)
            ->first();

        $this->view['workflowSection'] = $workflowSection;

        $ctaSection = $page?->sections
            ->where('key', 'cta')
            ->where('is_active', true)
            ->first();

        $this->view['ctaSection'] = $ctaSection;


        return view('frontend.about.index', $this->view);
    }
}