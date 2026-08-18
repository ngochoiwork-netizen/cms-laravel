<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    |
    | Các trường liên quan đến nội dung và SEO theo từng ngôn ngữ.
    |
    | Ví dụ:
    |
    | locale = vi
    | locale = en
    |
    */

    protected $fillable = [
        'post_id',

        'locale',

        /*
        |--------------------------------------------------------------------------
        | Content
        |--------------------------------------------------------------------------
        */

        'title',

        'short_description',

        'content',

        /*
        |--------------------------------------------------------------------------
        | SEO
        |--------------------------------------------------------------------------
        */

        'meta_title',

        'meta_description',

        'meta_keywords',

        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */

        'og_title',

        'og_description',

        /*
        |--------------------------------------------------------------------------
        | AI / FAQ / Schema
        |--------------------------------------------------------------------------
        */

        'ai_overview',

        'faq_schema',

        'schema_data',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    |
    | Tự động chuyển đổi dữ liệu JSON thành mảng.
    |
    */

    protected $casts = [
        'faq_schema' => 'array',

        'schema_data' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Bài viết gốc.
     *
     * post_translations.post_id
     *          ↓
     * posts.id
     *
     * Ví dụ:
     *
     * $translation->post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Kiểm tra đây có phải là bản dịch tiếng Việt hay không.
     */
    public function isVietnamese(): bool
    {
        return $this->locale === 'vi';
    }

    /**
     * Kiểm tra đây có phải là bản dịch tiếng Anh hay không.
     */
    public function isEnglish(): bool
    {
        return $this->locale === 'en';
    }
}