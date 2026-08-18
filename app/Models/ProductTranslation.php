<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = [
        'product_id',
        'locale',

        'name',
        'short_description',
        'description',

        'specifications',
        'features',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'og_title',
        'og_description',
    ];

    protected $casts = [
        'specifications' => 'array',
        'features' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}