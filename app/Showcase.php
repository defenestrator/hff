<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'outfitter_id',
        'outfitter_name',
        'body',
        'sidebar_bottom',
        'sidebar_top',
        'tagline',
        'fishery_type',
        'region',
        'thumbnail',
        'header_photo'
    ];

}
