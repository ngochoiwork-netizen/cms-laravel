<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    protected $fillable = [
        'hotel_id',
        'locale',
        'name',
        'short_description',
        'description',
        'address',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'schema_type',
        'schema_data',
    ];

    protected $casts = [
        'schema_data' => 'array',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}