<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $fillable = [
        'tag_id',
        'locale',
        'name',
        'description',
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

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}