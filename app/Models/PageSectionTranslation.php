<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSectionTranslation extends Model
{
    protected $fillable = [
        'page_section_id',
        'locale',

        'title',
        'subtitle',
        'content',

        'button_text',
        'button_link',

        'data_json',
    ];

    protected $casts = [
        'data_json' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function section()
    {
        return $this->belongsTo(PageSection::class, 'page_section_id');
    }
}