<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DestinationTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',

        'locale',

        'name',
        'slug',

        'short_description',
        'description',

        'address',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'canonical_url',
        'robots',

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

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}