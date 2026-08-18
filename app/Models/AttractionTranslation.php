<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttractionTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'attraction_id',
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

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }
}