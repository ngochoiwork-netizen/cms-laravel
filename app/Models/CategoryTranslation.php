<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $fillable = [
        'category_id',
        'locale',
        'name',
        'short_description',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'schema_type',
        'schema_data',
    ];

    protected $casts = [
        'schema_data' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}