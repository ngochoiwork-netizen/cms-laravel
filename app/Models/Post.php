<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    |
    | Các field thuộc nội dung chung của bài viết.
    |
    | Nội dung theo ngôn ngữ như:
    | title, short_description, content, meta_title...
    | sẽ nằm trong bảng post_translations.
    |
    */

    protected $fillable = [
        'category_id',
        'author_id',

        'thumbnail_id',
        'banner_id',
        'og_image_id',

        'slug',
        'type',

        'published_at',

        'view_count',
        'sort_order',

        'is_featured',
        'is_active',

        'canonical_url',

        'schema_type',
        'schema_data',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    |
    | Laravel sẽ tự động chuyển kiểu dữ liệu.
    |
    */

    protected $casts = [
        'schema_data' => 'array',

        'published_at' => 'datetime',

        'view_count' => 'integer',
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
     * Lấy tất cả bản dịch của bài viết.
     *
     * Ví dụ:
     *
     * $post->translations
     *
     * Có thể trả về:
     *
     * vi
     * en
     */
    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    /**
     * Lấy bản dịch theo ngôn ngữ hiện tại.
     *
     * Nếu không truyền locale:
     *
     * $post->translation
     *
     * Laravel sẽ dùng:
     *
     * app()->getLocale()
     */
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->hasOne(PostTranslation::class)
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
    | Main Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Danh mục của bài viết.
     *
     * posts.category_id
     *      ↓
     * categories.id
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Người viết bài.
     *
     * posts.author_id
     *      ↓
     * users.id
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Media Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Ảnh đại diện bài viết.
     */
    public function thumbnail()
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    /**
     * Banner của bài viết.
     */
    public function banner()
    {
        return $this->belongsTo(Media::class, 'banner_id');
    }

    /**
     * Ảnh dùng khi chia sẻ Facebook / Open Graph.
     */
    public function ogImage()
    {
        return $this->belongsTo(Media::class, 'og_image_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Tags
    |--------------------------------------------------------------------------
    */

    /**
     * Tags của bài viết.
     *
     * Đây là quan hệ polymorphic nhiều-nhiều.
     *
     * Post
     *   ↓
     * taggables
     *   ↓
     * Tag
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

    /**
     * Lấy title theo ngôn ngữ hiện tại.
     *
     * Ví dụ:
     *
     * $post->title
     */
    public function getTitleAttribute()
    {
        return optional($this->translation)->title
            ?? optional($this->vi)->title;
    }

    /**
     * Lấy mô tả ngắn.
     *
     * Ví dụ:
     *
     * $post->short_description
     */
    public function getShortDescriptionAttribute()
    {
        return optional($this->translation)->short_description
            ?? optional($this->vi)->short_description;
    }

    /**
     * Lấy nội dung bài viết.
     *
     * Ví dụ:
     *
     * $post->content
     */
    public function getContentAttribute()
    {
        return optional($this->translation)->content
            ?? optional($this->vi)->content;
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Chỉ lấy bài viết đang hoạt động.
     *
     * Ví dụ:
     *
     * Post::active()->get();
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Chỉ lấy bài viết nổi bật.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Chỉ lấy bài đã publish.
     *
     * Điều kiện:
     *
     * published_at != null
     * và published_at <= thời điểm hiện tại
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Kiểm tra bài viết đã được publish hay chưa.
     */
    public function isPublished(): bool
    {
        return $this->is_active
            && $this->published_at !== null
            && $this->published_at->lte(now());
    }

    /**
     * Tăng lượt xem bài viết.
     *
     * Ví dụ:
     *
     * $post->incrementViewCount();
     */
    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }
}