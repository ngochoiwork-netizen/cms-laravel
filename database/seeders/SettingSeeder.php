<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [

            /*
            |--------------------------------------------------------------------------
            | GENERAL
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'general',
                'key' => 'site_name',
                'label' => 'Website Name',
                'type' => 'text',
                'vi' => 'Senverse',
                'en' => 'Senverse',
            ],

            [
                'group' => 'general',
                'key' => 'site_slogan',
                'label' => 'Website Slogan',
                'type' => 'text',
                'vi' => 'Giải pháp vận hành toàn diện cho Nail Salon',
                'en' => 'Everything Your Salon Needs.',
            ],

            [
                'group' => 'general',
                'key' => 'company_name',
                'label' => 'Company Name',
                'type' => 'text',
                'vi' => 'Senverse LLC',
                'en' => 'Senverse LLC',
            ],

            [
                'group' => 'general',
                'key' => 'logo',
                'label' => 'Logo',
                'type' => 'image',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'general',
                'key' => 'favicon',
                'label' => 'Favicon',
                'type' => 'image',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'general',
                'key' => 'phone',
                'label' => 'Phone',
                'type' => 'text',
                'vi' => '(352) 426-2498',
                'en' => '(352) 426-2498',
            ],

            [
                'group' => 'general',
                'key' => 'email',
                'label' => 'Email',
                'type' => 'text',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'general',
                'key' => 'address',
                'label' => 'Address',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'general',
                'key' => 'copyright',
                'label' => 'Copyright',
                'type' => 'text',
                'vi' => '© Senverse LLC. All rights reserved.',
                'en' => '© Senverse LLC. All rights reserved.',
            ],

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'seo',
                'key' => 'home_meta_title',
                'label' => 'Home Meta Title',
                'type' => 'text',
                'vi' => 'Senverse POS',
                'en' => 'Senverse POS',
            ],

            [
                'group' => 'seo',
                'key' => 'home_meta_description',
                'label' => 'Home Meta Description',
                'type' => 'textarea',
                'vi' => 'Giải pháp POS, thanh toán và marketing dành cho Nail Salon.',
                'en' => 'POS, payment and marketing solutions for nail salons.',
            ],

            [
                'group' => 'seo',
                'key' => 'home_meta_keywords',
                'label' => 'Home Meta Keywords',
                'type' => 'textarea',
                'vi' => 'POS, Nail Salon, Marketing, Merchant Services',
                'en' => 'POS, Nail Salon, Marketing, Merchant Services',
            ],

            [
                'group' => 'seo',
                'key' => 'default_og_image',
                'label' => 'Default OG Image',
                'type' => 'image',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'seo',
                'key' => 'robots_default',
                'label' => 'Robots',
                'type' => 'text',
                'vi' => 'index,follow',
                'en' => 'index,follow',
            ],

            /*
            |--------------------------------------------------------------------------
            | SOCIAL
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'social',
                'key' => 'facebook_url',
                'label' => 'Facebook URL',
                'type' => 'text',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'social',
                'key' => 'instagram_url',
                'label' => 'Instagram URL',
                'type' => 'text',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'social',
                'key' => 'linkedin_url',
                'label' => 'LinkedIn URL',
                'type' => 'text',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'social',
                'key' => 'youtube_url',
                'label' => 'YouTube URL',
                'type' => 'text',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'social',
                'key' => 'tiktok_url',
                'label' => 'TikTok URL',
                'type' => 'text',
                'vi' => '',
                'en' => '',
            ],

            /*
            |--------------------------------------------------------------------------
            | SCHEMA
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'schema',
                'key' => 'schema_enable',
                'label' => 'Enable Schema',
                'type' => 'boolean',
                'vi' => '1',
                'en' => '1',
            ],

            [
                'group' => 'schema',
                'key' => 'schema_type',
                'label' => 'Schema Type',
                'type' => 'text',
                'vi' => 'Organization',
                'en' => 'Organization',
            ],

            /*
            |--------------------------------------------------------------------------
            | TRACKING
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'tracking',
                'key' => 'google_analytics',
                'label' => 'Google Analytics',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'tracking',
                'key' => 'google_tag_manager',
                'label' => 'Google Tag Manager',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'tracking',
                'key' => 'meta_pixel',
                'label' => 'Meta Pixel',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],

            /*
            |--------------------------------------------------------------------------
            | CUSTOM SCRIPT
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'script',
                'key' => 'custom_head_script',
                'label' => 'Custom Head Script',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],

            [
                'group' => 'script',
                'key' => 'custom_body_script',
                'label' => 'Custom Body Script',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],
        ];

        foreach ($settings as $item) {

            $setting = Setting::updateOrCreate(
                [
                    'key' => $item['key'],
                ],
                [
                    'group' => $item['group'],
                    'label' => $item['label'],
                    'type' => $item['type'],
                    'is_active' => true,
                ]
            );

            foreach (['vi', 'en'] as $locale) {

                SettingTranslation::updateOrCreate(
                    [
                        'setting_id' => $setting->id,
                        'locale' => $locale,
                    ],
                    [
                        'value' => $item[$locale] ?? '',
                    ]
                );
            }
        }
    }
}