<?php

namespace App\Seo\Resolvers;

use App\Models\Page;
use App\Seo\Contracts\SeoResolver;

class PageSeoResolver implements SeoResolver
{
    /**
     * Resolver này xử lý Page.
     */
    public function supports(object $model): bool
    {
        return $model instanceof Page;
    }

    /**
     * Chuẩn hóa dữ liệu SEO cho Page.
     */
    public function resolve(
        object $model,
        string $locale
    ): array {
        /** @var Page $model */

        /*
        |--------------------------------------------------------------------------
        | Translation
        |--------------------------------------------------------------------------
        |
        | Lấy translation đúng với locale hiện tại.
        |
        | Ví dụ:
        | en → PageTranslation locale = en
        | vi → PageTranslation locale = vi
        |
        */

        $translation = $model->translations
            ->firstWhere('locale', $locale);

        /*
        |--------------------------------------------------------------------------
        | Translation Status
        |--------------------------------------------------------------------------
        |
        | Lưu lại trạng thái trước khi fallback.
        |
        | Nếu không tồn tại translation đúng locale,
        | SeoService sau này sẽ tự chuyển robots thành:
        |
        | noindex, follow
        |
        */

        $hasTranslation = $translation !== null;

        /*
        |--------------------------------------------------------------------------
        | Fallback Translation
        |--------------------------------------------------------------------------
        |
        | Fallback chỉ nhằm tránh trang bị trống dữ liệu khi hiển thị.
        |
        | Ưu tiên:
        |
        | 1. English
        | 2. Vietnamese
        |
        | Việc fallback KHÔNG có nghĩa URL đó được index.
        | SeoService sẽ dựa vào has_translation để xử lý.
        |
        */

        if (!$translation) {
            $translation =
                $model->translations->firstWhere('locale', 'en')
                ?? $model->translations->firstWhere('locale', 'vi');
        }

        /*
        |--------------------------------------------------------------------------
        | Meta Title
        |--------------------------------------------------------------------------
        |
        | Ưu tiên:
        |
        | meta_title
        | ↓
        | title
        |
        */

        $title =
            $translation?->meta_title
            ?: $translation?->title;

        /*
        |--------------------------------------------------------------------------
        | Meta Description
        |--------------------------------------------------------------------------
        |
        | Ưu tiên:
        |
        | meta_description
        | ↓
        | short_description
        |
        */

        $description =
            $translation?->meta_description
            ?: $translation?->short_description;

        /*
        |--------------------------------------------------------------------------
        | Open Graph Title
        |--------------------------------------------------------------------------
        */

        $ogTitle =
            $translation?->og_title
            ?: $title;

        /*
        |--------------------------------------------------------------------------
        | Open Graph Description
        |--------------------------------------------------------------------------
        */

        $ogDescription =
            $translation?->og_description
            ?: $description;

        /*
        |--------------------------------------------------------------------------
        | Result
        |--------------------------------------------------------------------------
        |
        | Tất cả Resolver sẽ cố gắng trả về cùng một cấu trúc.
        |
        */

        return [

            /*
            |--------------------------------------------------------------------------
            | Locale
            |--------------------------------------------------------------------------
            */

            'locale' => $locale,

            'has_translation' => $hasTranslation,

            /*
            |--------------------------------------------------------------------------
            | General SEO
            |--------------------------------------------------------------------------
            */

            'title' => $title,

            'description' => $description,

            'keywords' => $translation?->meta_keywords,

            /*
            |--------------------------------------------------------------------------
            | Model
            |--------------------------------------------------------------------------
            |
            | Giữ model để SeoService / SchemaService có thể sử dụng
            | những dữ liệu chuyên biệt sau này.
            |
            */

            'model' => $model,

            'model_type' => 'page',

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

            'robots' =>
                $model->robots ?: 'index, follow',

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
            |
            | Page.schema_type:
            | WebPage / AboutPage / ContactPage...
            |
            | schema_data ưu tiên translation trước.
            |
            */

            'schema_type' =>
                $model->schema_type ?: 'WebPage',

            'schema_data' =>
                $translation?->schema_data
                ?: $model->schema_data
                ?: [],

            /*
            |--------------------------------------------------------------------------
            | FAQ Schema
            |--------------------------------------------------------------------------
            */

            'faq_schema' =>
                $translation?->faq_schema ?: [],

            /*
            |--------------------------------------------------------------------------
            | AI Search
            |--------------------------------------------------------------------------
            */

            'ai_overview' =>
                $translation?->ai_overview,
        ];
    }
}