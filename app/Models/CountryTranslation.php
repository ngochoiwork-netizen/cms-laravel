<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    protected $fillable = [
        'country_id',
        'locale',
        'name',
        'description',
        'meta_title',
        'meta_description',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}