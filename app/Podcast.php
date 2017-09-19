<?php

namespace App;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Podcast
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereUpdatedAt($value)
 */
class Podcast extends Model
{
    use Taggable;
    protected $table = 'podcasts';
    protected $fillable = ['title', 'episode', 'season', 'file', 'slug', 'cover_image'];

    public function publication()
    {
        return $this->hasOne(Publication::class);
    }
}
