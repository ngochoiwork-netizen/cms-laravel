<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $fillable = [
        'post_id',
        'locale',
        'title',
        'short_description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'ai_overview',
        'faq_schema',
        'schema_data',
    ];

    protected $casts = [
        'faq_schema' => 'array',
        'schema_data' => 'array',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}