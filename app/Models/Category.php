<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'type',
        'slug',
        'thumbnail_id',
        'banner_id',
        'og_image_id',
        'canonical_url',
        'robots',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function translation($locale = 'vi')
    {
        return $this->hasOne(CategoryTranslation::class)
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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
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

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function getNameAttribute()
    {
        return optional($this->translation)->name;
    }

    public function getDescriptionAttribute()
    {
        return optional($this->translation)->description;
    }

    /*
    |--------------------------------------------------------------------------
    | Tree
    |--------------------------------------------------------------------------
    */

    public static function treeOptions($excludeId = null, $parentId = null, $prefix = '', $type = null)
    {
        $query = self::with('translation')
            ->where('parent_id', $parentId)
            ->orderBy('sort_order')
            ->orderBy('id');

        if ($type) {
            $query->where('type', $type);
        }

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $categories = $query->get();

        $result = [];

        foreach ($categories as $category) {
            $result[] = [
                'id' => $category->id,
                'name' => $prefix . ($category->name ?? 'No Name'),
            ];

            $children = self::treeOptions(
                $excludeId,
                $category->id,
                $prefix . '— ',
                $type
            );

            $result = array_merge($result, $children);
        }

        return $result;
    }
}