<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaSetting extends Model
{
    protected $fillable = [
        'google_analytics_id',
        'google_ads_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_author',
        'og_title',
        'og_description',
        'og_image',
    ];
}