<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'type',
        'label',
        'description',
        'options',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'options' => 'array',
        'is_active' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(SettingTranslation::class);
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->translations
            ->where('locale', $locale)
            ->first();
    }

    public function getValue($locale = null, $default = null)
    {
        $locale = $locale ?: app()->getLocale();

        $translation = $this->translations
            ->where('locale', $locale)
            ->first();

        return $translation?->value ?? $default;
    }
}