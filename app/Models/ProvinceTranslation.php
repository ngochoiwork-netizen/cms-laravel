<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceTranslation extends Model
{
    protected $fillable = [
        'province_id',
        'locale',
        'name',
        'description',
        'meta_title',
        'meta_description',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}