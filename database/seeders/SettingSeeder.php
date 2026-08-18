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

            // GENERAL
            [
                'group' => 'general',
                'key' => 'site_name',
                'label' => 'Tên website',
                'type' => 'text',
                'vi' => 'Blog Du Lịch',
                'en' => 'Travel Blog',
            ],

            [
                'group' => 'general',
                'key' => 'site_slogan',
                'label' => 'Slogan website',
                'type' => 'text',
                'vi' => 'Khám phá địa điểm đẹp',
                'en' => 'Explore beautiful destinations',
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

            // HOME SEO
            [
                'group' => 'seo',
                'key' => 'home_meta_title',
                'label' => 'Meta Title Trang Chủ',
                'type' => 'text',
                'vi' => 'Blog Du Lịch Việt Nam',
                'en' => 'Vietnam Travel Blog',
            ],

            [
                'group' => 'seo',
                'key' => 'home_meta_description',
                'label' => 'Meta Description Trang Chủ',
                'type' => 'textarea',
                'vi' => 'Khám phá du lịch Việt Nam, khách sạn, địa điểm đẹp và kinh nghiệm du lịch.',
                'en' => 'Explore Vietnam travel destinations, hotels and travel experiences.',
            ],

            [
                'group' => 'seo',
                'key' => 'home_meta_keywords',
                'label' => 'Meta Keywords',
                'type' => 'textarea',
                'vi' => 'du lịch, địa điểm đẹp, khách sạn',
                'en' => 'travel, destination, hotel',
            ],

            // SOCIAL
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
                'key' => 'youtube_url',
                'label' => 'Youtube URL',
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

            // SCHEMA
            [
                'group' => 'schema',
                'key' => 'schema_enable',
                'label' => 'Bật Schema',
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

            // SCRIPT
            [
                'group' => 'script',
                'key' => 'google_analytics',
                'label' => 'Google Analytics',
                'type' => 'textarea',
                'vi' => '',
                'en' => '',
            ],

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
                    'key' => $item['key']
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