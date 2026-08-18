<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',

        'thumbnail_id',
        'banner_id',
        'og_image_id',

        'slug',
        'sku',
        'brand',
        'model',
        'warranty',

        'price',
        'sale_price',
        'stock_quantity',

        'status',
        'is_featured',
        'is_active',
        'view_count',
        'sort_order',

        'canonical_url',
        'robots',

        'schema_type',
        'schema_data',
    ];

    protected $casts = [
        'schema_data' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:0',
        'sale_price' => 'decimal:0',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(ProductTranslation::class)
            ->where('locale', $locale);
    }

    public function vi()
    {
        return $this->hasOne(ProductTranslation::class)
            ->where('locale', 'vi');
    }

    public function en()
    {
        return $this->hasOne(ProductTranslation::class)
            ->where('locale', 'en');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    public function banner()
    {
        return $this->belongsTo(Media::class, 'banner_id');
    }

    public function ogImage()
    {
        return $this->belongsTo(Media::class, 'og_image_id');
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'mediaable')
            ->withPivot(['type', 'sort_order'])
            ->withTimestamps();
    }

    public function galleryImages()
    {
        return $this->media()
            ->wherePivot('type', 'gallery')
            ->orderBy('mediaables.sort_order');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getNameAttribute()
    {
        return optional($this->translation)->name
            ?? optional($this->vi)->name;
    }

    public function getShortDescriptionAttribute()
    {
        return optional($this->translation)->short_description
            ?? optional($this->vi)->short_description;
    }

    public function getDescriptionAttribute()
    {
        return optional($this->translation)->description
            ?? optional($this->vi)->description;
    }

    public function getSpecificationsAttribute()
    {
        return optional($this->translation)->specifications
            ?? optional($this->vi)->specifications
            ?? [];
    }

    public function getFeaturesAttribute()
    {
        return optional($this->translation)->features
            ?? optional($this->vi)->features
            ?? [];
    }

    public function getFinalPriceAttribute()
    {
        return $this->sale_price ?: $this->price;
    }

    public function getDiscountPercentAttribute()
    {
        if (!$this->price || !$this->sale_price || $this->sale_price >= $this->price) {
            return 0;
        }

        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}