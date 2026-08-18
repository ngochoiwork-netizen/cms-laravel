<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code',
        'name',
        'is_default',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'is_default' => 'boolean',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeDefault(Builder $query): Builder
    {
        return $query->where('is_default', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public static function defaultLocale(): ?self
    {
        return static::query()
            ->default()
            ->first();
    }

    public static function activeLocales()
    {
        return static::query()
            ->active()
            ->orderBy('id')
            ->get();
    }
}