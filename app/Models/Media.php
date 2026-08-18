<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Fillable
    |--------------------------------------------------------------------------
    |
    | Danh sách các field được phép gán dữ liệu hàng loạt bằng:
    |
    | Media::create([...])
    | $media->update([...])
    |
    */

    protected $fillable = [
        'file_name',      // Tên file gốc, ví dụ: logo.png
        'file_path',      // Đường dẫn file trong storage, ví dụ: uploads/logo.png
        'mime_type',      // Loại file, ví dụ: image/png, image/jpeg
        'file_size',      // Kích thước file tính theo byte
        'width',          // Chiều rộng ảnh
        'height',         // Chiều cao ảnh

        'title',          // Tiêu đề ảnh
        'alt_text',       // Alt text dùng cho SEO và accessibility
        'caption',        // Chú thích ảnh
        'description',    // Mô tả chi tiết ảnh

        'uploaded_by',    // ID của user đã upload file
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    |
    | Laravel tự động ép kiểu dữ liệu khi lấy từ database.
    |
    | Ví dụ:
    | width trong database là "1200"
    | Laravel trả về integer 1200
    |
    */

    protected $casts = [
        'file_size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    |
    | Các field không tồn tại trực tiếp trong database
    | nhưng sẽ tự động được thêm vào Model khi serialize JSON/array.
    |
    | Ví dụ:
    |
    | $media->toArray()
    |
    | sẽ có thêm:
    | url => https://domain.com/storage/uploads/image.jpg
    |
    */

    protected $appends = [
        'url',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Tạo URL đầy đủ cho file media.
     *
     * Database chỉ lưu:
     *
     * uploads/logo.png
     *
     * Khi gọi:
     *
     * $media->url
     *
     * Laravel sẽ trả:
     *
     * https://domain.com/storage/uploads/logo.png
     */
    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * User đã upload media này.
     *
     * Quan hệ:
     *
     * media.uploaded_by
     *      ↓
     * users.id
     *
     * Ví dụ:
     *
     * $media->uploader
     * $media->uploader->name
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Danh sách Product đang sử dụng media này qua bảng mediaables.
     *
     * Đây là quan hệ polymorphic many-to-many.
     *
     * Ví dụ:
     *
     * Media
     *   ↓
     * mediaables
     *   ↓
     * Product
     *
     * Có thể dùng media cho gallery của Product.
     *
     * Ví dụ:
     *
     * $media->products
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'mediaable')
            ->withPivot([
                'type',       // Loại media: gallery, image,...
                'sort_order', // Thứ tự hiển thị
            ])
            ->withTimestamps();
    }
}