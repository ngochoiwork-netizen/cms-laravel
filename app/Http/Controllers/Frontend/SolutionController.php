<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Post;

class SolutionController extends Controller
{
    protected array $view = [];

    public function show(string $slug)
    {
        $category = Category::with('translations')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $this->view['category'] = $category;

        switch ($slug) {
            case 'pos-system':
                return $this->posSystem();

            case 'merchant-services':
                return $this->merchantServices();

            case 'growth-services':
                return $this->growthServices();

            default:
                abort(404);
        }
    }

    /**
     * POS System
     */
    private function posSystem()
    {
        // Load dữ liệu riêng của POS System tại đây
        $slider = Slider::with([
            'image',
            'translations',
        ])
            ->active()
            ->position('pos-system')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->first();

        $this->view['slider'] = $slider;

        $page = Page::with([
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'pos-system')
            ->first();

        $this->view['page'] = $page;

        $featureSection = $page?->sections
            ->where('key', 'features')
            ->where('is_active', true)
            ->first();

        $this->view['featureSection'] = $featureSection;

        $customerSection = $page?->sections
            ->where('key', 'for_customer')
            ->where('is_active', true)
            ->first();

        $this->view['customerSection'] = $customerSection;
        
        $ownerSection = $page?->sections
            ->where('key', 'for_owner')
            ->where('is_active', true)
            ->first();

        $this->view['ownerSection'] = $ownerSection;

        $techSection = $page?->sections
            ->where('key', 'for_technical')
            ->where('is_active', true)
            ->first();

        $this->view['techSection'] = $techSection;

        $workflowSection = $page?->sections
            ->where('key', 'workflow')
            ->where('is_active', true)
            ->first();

        $this->view['workflowSection'] = $workflowSection;

        $featureSection = $page?->sections
            ->where('key', 'features')
            ->where('is_active', true)
            ->first();

        $this->view['featureSection'] = $featureSection;

        $home = Page::with([
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'home')
            ->first();
        
            $testimonials = Post::with([
            'translations',
            'thumbnail',
        ])
            ->whereHas('category', function ($query) {
                $query->where('slug', 'khach-hang');
            })
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->take(5)
            ->get();
        //dd($testimonials);
        $this->view['testimonials'] = $testimonials;

        $faqs = Post::with([
            'translations',
            'category',
        ])
        ->active()
        ->whereHas('category', function ($query) {
            $query->where('slug', 'faq');
        })
        ->orderBy('sort_order')
        ->take(5)
        ->get();

        $this->view['faqs'] = $faqs;

        $ctaSection = $home?->sections
        ->where('key', 'cta')
        ->where('is_active', true)
        ->first();
        $this->view['ctaSection'] = $ctaSection;

        return view('frontend.solutions.pos-system.index',$this->view);
    }

    /**
     * Merchant Services
     */
    private function merchantServices()
    {
        // Load dữ liệu riêng của Merchant Services tại đây
        $slider = Slider::with([
            'image',
            'translations',
        ])
            ->active()
            ->position('merchant-services')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->first();
        $this->view['slider'] = $slider;
        

        $page = Page::with([
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'merchant-services')
            ->first();

        $this->view['page'] = $page;

        $benefitSection = $page?->sections
            ->where('key', 'benefits')
            ->where('is_active', true)
            ->first();

        $this->view['benefitSection'] = $benefitSection;


        $paymentMethodSection = $page?->sections
            ->where('key', 'payment_methods')
            ->where('is_active', true)
            ->first();

        $this->view['paymentMethodSection'] = $paymentMethodSection;

        $posIntegrationSection = $page?->sections
            ->where('key', 'workflow')
            ->where('is_active', true)
            ->first();

        $this->view['posIntegrationSection'] = $posIntegrationSection;

        $paymentManagementSection = $page?->sections
            ->where('key', 'payment_manament')
            ->where('is_active', true)
            ->first();

        $this->view['paymentManagementSection'] = $paymentManagementSection;


        $faqSection = $page?->sections
            ->where('key', 'faq')
            ->where('is_active', true)
            ->first();

        $this->view['faqSection'] = $faqSection;

        $testimonials = Post::with([
            'translations',
            'thumbnail',
        ])
            ->whereHas('category', function ($query) {
                $query->where('slug', 'khach-hang');
            })
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->take(5)
            ->get();
        //dd($testimonials);
        $this->view['testimonials'] = $testimonials;

        $ctaSection = $page?->sections
            ->where('key', 'cta')
            ->where('is_active', true)
            ->first();

        $this->view['ctaSection'] = $ctaSection;

        return view('frontend.solutions.merchant-services.index',$this->view);
    }

    /**
     * Growth Services
     */
    private function growthServices()
    {
        // Load dữ liệu riêng của Growth Services tại đây

        return view(
            'frontend.solutions.growth-services.index',
            $this->view
        );
    }
}