<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'sort_order' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Translations
    |--------------------------------------------------------------------------
    */

    /**
     * Lấy tất cả bản dịch.
     */
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    /**
     * Lấy bản dịch theo ngôn ngữ hiện tại.
     */
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(CategoryTranslation::class)
            ->where('locale', $locale);
    }

    /**
     * Bản dịch tiếng Việt.
     */
    public function vi()
    {
        return $this->translation('vi');
    }

    /**
     * Bản dịch tiếng Anh.
     */
    public function en()
    {
        return $this->translation('en');
    }

    /*
    |--------------------------------------------------------------------------
    | Tree Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Danh mục cha.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Danh sách danh mục con.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Media Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Ảnh đại diện.
     */
    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    /**
     * Ảnh banner.
     */
    public function banner()
    {
        return $this->belongsTo(Media::class, 'banner_id');
    }

    /**
     * Ảnh Open Graph.
     */
    public function ogImage()
    {
        return $this->belongsTo(Media::class, 'og_image_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Lấy tên danh mục theo ngôn ngữ hiện tại.
     */
    public function getNameAttribute()
    {
        return optional($this->translation)->name
            ?? optional($this->vi)->name;
    }

    /**
     * Lấy mô tả danh mục.
     */
    public function getDescriptionAttribute()
    {
        return optional($this->translation)->description
            ?? optional($this->vi)->description;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Chỉ lấy các danh mục đang hoạt động.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Chỉ lấy các danh mục nổi bật.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Tạo danh sách cây danh mục.
     *
     * Dùng cho:
     *
     * - Select box.
     * - Dropdown trong Admin.
     * - Chọn danh mục cha.
     */
    public static function treeOptions(
        $excludeId = null,
        $parentId = null,
        $prefix = '',
        $type = null
    ) {
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