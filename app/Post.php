<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

/**
 * App\Post
 *
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasTags;
    protected $fillable = [ 'title', 'slug', 'user_id', 'body', 'author'];
}
