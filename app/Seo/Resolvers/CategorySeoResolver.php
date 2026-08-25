<?php

namespace App\Seo\Resolvers;

use App\Models\Category;
use App\Seo\Contracts\SeoResolver;

class CategorySeoResolver implements SeoResolver
{
    /**
     * Resolver này xử lý Category.
     */
    public function supports(object $model): bool
    {
        return $model instanceof Category;
    }

    /**
     * Chuẩn hóa dữ liệu SEO cho Category.
     */
    public function resolve(
        object $model,
        string $locale
    ): array {
        /** @var Category $model */

        /*
        |--------------------------------------------------------------------------
        | Translation
        |--------------------------------------------------------------------------
        */

        $translation = $model->translations
            ->firstWhere('locale', $locale);

        /*
        |--------------------------------------------------------------------------
        | Kiểm tra translation
        |--------------------------------------------------------------------------
        */

        $hasTranslation = $translation !== null;

        /*
        |--------------------------------------------------------------------------
        | Fallback
        |--------------------------------------------------------------------------
        |
        | Fallback chỉ dùng để tránh lỗi hiển thị.
        | SeoService sau này sẽ noindex nếu locale hiện tại không tồn tại.
        |
        */

        if (!$translation) {
            $translation =
                $model->translations->firstWhere('locale', 'en')
                ?? $model->translations->firstWhere('locale', 'vi');
        }

        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        */

        $title =
            $translation?->meta_title
            ?: $translation?->name;

        /*
        |--------------------------------------------------------------------------
        | Description
        |--------------------------------------------------------------------------
        */

        $description =
            $translation?->meta_description
            ?: $translation?->short_description
            ?: $translation?->description;

        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */

        $ogTitle =
            $translation?->og_title
            ?: $title;

        $ogDescription =
            $translation?->og_description
            ?: $description;

        /*
        |--------------------------------------------------------------------------
        | Result
        |--------------------------------------------------------------------------
        */

        return [

            'locale' => $locale,

            'has_translation' => $hasTranslation,

            /*
            |--------------------------------------------------------------------------
            | General
            |--------------------------------------------------------------------------
            */

            'title' => $title,

            'description' => $description,

            'keywords' => $translation?->meta_keywords,

            /*
            |--------------------------------------------------------------------------
            | Model
            |--------------------------------------------------------------------------
            */

            'model' => $model,

            'model_type' => 'category',

            /*
            |--------------------------------------------------------------------------
            | URL
            |--------------------------------------------------------------------------
            */

            'slug' => $model->slug,

            'canonical_url' => $model->canonical_url,

            /*
            |--------------------------------------------------------------------------
            | Robots
            |--------------------------------------------------------------------------
            */

            'robots' => $model->robots ?: 'index, follow',

            /*
            |--------------------------------------------------------------------------
            | Open Graph
            |--------------------------------------------------------------------------
            */

            'og_title' => $ogTitle,

            'og_description' => $ogDescription,

            'og_image' => $model->ogImage,

            /*
            |--------------------------------------------------------------------------
            | Schema
            |--------------------------------------------------------------------------
            */

            'schema_type' =>
                $translation?->schema_type
                ?: 'CollectionPage',

            'schema_data' =>
                $translation?->schema_data ?: [],
        ];
    }
}