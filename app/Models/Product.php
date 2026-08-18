<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        /*
        |--------------------------------------------------------------------------
        | Relations
        |--------------------------------------------------------------------------
        */

        'category_id',

        'user_id',

        /*
        |--------------------------------------------------------------------------
        | Media
        |--------------------------------------------------------------------------
        */

        'thumbnail_id',

        'banner_id',

        'og_image_id',

        /*
        |--------------------------------------------------------------------------
        | Basic Information
        |--------------------------------------------------------------------------
        */

        'slug',

        'sku',

        'brand',

        'model',

        /*
        |--------------------------------------------------------------------------
        | Pricing
        |--------------------------------------------------------------------------
        */

        'price',

        'sale_price',

        /*
        |--------------------------------------------------------------------------
        | Inventory
        |--------------------------------------------------------------------------
        */

        'stock_quantity',

        /*
        |--------------------------------------------------------------------------
        | Display
        |--------------------------------------------------------------------------
        */

        'sort_order',

        'is_featured',

        'is_active',

        /*
        |--------------------------------------------------------------------------
        | SEO
        |--------------------------------------------------------------------------
        */

        'canonical_url',

        'robots',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'price' => 'decimal:2',

        'sale_price' => 'decimal:2',

        'stock_quantity' => 'integer',

        'sort_order' => 'integer',

        'is_featured' => 'boolean',

        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Translations
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
        return $this->translation('vi');
    }

    public function en()
    {
        return $this->translation('en');
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    */

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

    public function gallery()
    {
        return $this->morphToMany(Media::class, 'mediaable')
            ->withPivot([
                'type',
                'sort_order',
            ])
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Tags
    |--------------------------------------------------------------------------
    */

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
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

    /*
    |--------------------------------------------------------------------------
    | Pricing Helpers
    |--------------------------------------------------------------------------
    */

    public function getFinalPriceAttribute()
    {
        return $this->sale_price ?: $this->price;
    }

    public function getDiscountPercentAttribute()
    {
        if (!$this->sale_price || !$this->price) {
            return 0;
        }

        return round(
            (($this->price - $this->sale_price)
            / $this->price) * 100
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function inStock(): bool
    {
        return $this->stock_quantity > 0;
    }
}