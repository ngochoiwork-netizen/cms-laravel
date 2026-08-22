<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
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
            ->where('slug', 'contact')
            ->firstOrFail();

        $this->view['page'] = $page;

        /*
        |--------------------------------------------------------------------------
        | Hero
        |--------------------------------------------------------------------------
        */

        $contactSection = $page?->sections
            ->where('key', 'contact')
            ->where('is_active', true)
            ->first();

        $this->view['contactSection'] = $contactSection;

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

        $home = Page::with([
            'translations',
            'sections.translations',
            'sections.image',
        ])
            ->active()
            ->where('slug', 'home')
            ->firstOrFail();



        $ctaSection = $home?->sections
        ->where('key', 'cta')
        ->where('is_active', true)
        ->first();
        $this->view['ctaSection'] = $ctaSection;




        return view('frontend.contact.index', $this->view);
    }

     /*
    |--------------------------------------------------------------------------
    | Submit Contact Form
    |--------------------------------------------------------------------------
    */

    public function submit(ContactRequest $request)
    {
        $data = $request->validated();

        $data['sms_consent'] = $request->boolean('sms_consent');

        $data['marketing_sms_consent'] =
            $request->boolean('marketing_sms_consent');


        /*
        |--------------------------------------------------------------------------
        | Receiver Email
        |--------------------------------------------------------------------------
        */

        $receiver = "ngochoi.work@gmail.com";

        if (!$receiver) {
            return back()
                ->withInput()
                ->withErrors([
                    'form' => 'Unable to send your message at this time.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Send Email
        |--------------------------------------------------------------------------
        */

        Mail::to($receiver)
            ->send(new ContactMail($data));


        return redirect()
            ->route('contact')
            ->with(
                'success',
                'Thank you for contacting Senverse. Our team will get back to you soon.'
            );
    }
}
