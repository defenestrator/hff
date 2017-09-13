<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Publications
 *
 * @mixin \Eloquent
 */
class Publication extends Model
{
    protected $table = 'publications';
    protected $fillable = [ 'type', 'post_id', 'report_id', 'podcast_id', 'newsletter_id'];

}
