<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Post;
use App\Services\SeoService;

class PolicyController extends Controller
{
    protected array $view = [];
    public function show(string $slug)
    {
        $page = Page::with([
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'policy')
            ->firstOrFail();

        $this->view['page'] = $page;

        /*
        |--------------------------------------------------------------------------
        | Chính sách đang xem
        |--------------------------------------------------------------------------
        */

        $policySection = $page->sections
            ->where('key', $slug)
            ->where('is_active', true)
            ->first();

        abort_if(!$policySection, 404);

        $this->view['policySection'] = $policySection;

        return view('frontend.policy.show',$this->view);
    }
}