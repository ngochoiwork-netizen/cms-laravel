<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'position',
        'link',
        'button_text',
        'image_id',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function translations()
    {
        return $this->hasMany(SliderTranslation::class);
    }

    public function translate($locale = 'vi')
    {
        return $this->translations
            ->where('locale', $locale)
            ->first();
    }
}