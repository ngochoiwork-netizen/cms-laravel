<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
        'width',
        'height',
        'title',
        'alt_text',
        'caption',
        'description',
        'uploaded_by',
    ];

    protected $appends = [
        'url',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessor
    |--------------------------------------------------------------------------
    */

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    public function products()
    {
        return $this->morphedByMany(Product::class, 'mediaable');
    }

    /*
    |--------------------------------------------------------------------------
    | Hotels
    |--------------------------------------------------------------------------
    */

    public function hotels()
    {
        return $this->morphedByMany(Hotel::class, 'mediaable');
    }
}