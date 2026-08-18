<?php

use App\Models\Setting;
use App\Models\Media;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        static $settings = null;

        if ($settings === null) {
            $settings = Setting::pluck('value', 'key')->toArray();
        }

        return $settings[$key] ?? $default;
    }
}

if (!function_exists('media_url')) {
    function media_url($id, $default = null)
    {
        if (!$id) {
            return $default;
        }

        return cache()->remember("media_url_$id", 3600, function () use ($id, $default) {
            $media = Media::find($id);

            if (!$media) {
                return $default;
            }

            return asset('storage/' . ($media->path ?? $media->file_path));
        });
    }
}

if (!function_exists('site_schema')) {
    function site_schema()
    {
        // Tắt schema
        if ((int) setting('schema_enable') !== 1) {
            return null;
        }

        // Ưu tiên JSON custom
        if (!empty(setting('schema_json'))) {
            return setting('schema_json');
        }

        $logoUrl = media_url(setting('schema_logo'));

        $schema = [
            '@context' => 'https://schema.org',
            '@type'    => setting('schema_type', 'Organization'),
            'name'     => setting('schema_name', setting('site_name', 'Website')),
            'url'      => url('/'),
        ];

        if ($logoUrl) {
            $schema['logo'] = $logoUrl;
        }

        if (setting('schema_phone')) {
            $schema['telephone'] = setting('schema_phone');
        }

        if (setting('schema_address')) {
            $schema['address'] = [
                '@type' => 'PostalAddress',
                'streetAddress' => setting('schema_address'),
            ];
        }

        $sameAs = array_filter([
            setting('facebook'),
            setting('youtube'),
            setting('tiktok'),
            setting('zalo'),
        ]);

        if (!empty($sameAs)) {
            $schema['sameAs'] = array_values($sameAs);
        }

        return json_encode(
            $schema,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
}
if (!function_exists('page_schema')) {
    function page_schema($model = null, $defaultType = 'WebPage')
    {
        if (!$model) return null;

        $type = $model->schema_type ?: $defaultType;

        // ===== NAME =====
        $name = $model->title
            ?? $model->name
            ?? setting('site_name', 'Website');

        // ===== DESCRIPTION =====
        $description =
            $model->meta_description
            ?? $model->excerpt
            ?? $model->short_description
            ?? null;

        // ===== IMAGE =====
        $image = null;

        if (!empty($model->og_image_id)) {
            $image = media_url($model->og_image_id);
        } elseif (!empty($model->thumbnail_id)) {
            $image = media_url($model->thumbnail_id);
        }

        // ===== BASE SCHEMA =====
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => $name,
            'headline' => $name,
            'url' => url()->current(),
        ];

        if ($description) {
            $schema['description'] = $description;
        }

        if ($image) {
            $schema['image'] = $image;
        }

        // ===== POST (ARTICLE) =====
        if ($type === 'Article' || isset($model->published_at)) {

            if (!empty($model->published_at)) {
                $schema['datePublished'] = $model->published_at->toIso8601String();
            }

            if (!empty($model->updated_at)) {
                $schema['dateModified'] = $model->updated_at->toIso8601String();
            }

            $schema['author'] = [
                '@type' => 'Person',
                'name' => $model->user->name ?? setting('site_name', 'Admin'),
            ];
        }

        // ===== PRODUCT =====
        if ($type === 'Product' || isset($model->price)) {

            if (!empty($model->price)) {
                $schema['offers'] = [
                    '@type' => 'Offer',
                    'price' => $model->sale_price ?? $model->price,
                    'priceCurrency' => 'VND',
                    'availability' => 'https://schema.org/InStock',
                    'url' => url()->current(),
                ];
            }
        }

        // ===== PUBLISHER =====
        $schema['publisher'] = [
            '@type' => 'Organization',
            'name' => setting('schema_name', setting('site_name', 'Website')),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => media_url(setting('schema_logo'), media_url(setting('logo'))),
            ],
        ];

        return json_encode(
            array_filter($schema),
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
        );
    }
}