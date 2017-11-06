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
 * @property string $title
 * @property string $slug
 * @property int $episode
 * @property int $season
 * @property string|null $file
 * @property string|null $cover_image
 * @property string $notes
 * @property-read array $tag_array
 * @property-read array $tag_array_normalized
 * @property-read string $tag_list
 * @property-read string $tag_list_normalized
 * @property-read \App\Publication $publication
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cviebrock\EloquentTaggable\Models\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast isNotTagged()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast isTagged()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereEpisode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast withAllTags($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast withAnyTags($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast withoutAllTags($tags, $includeUntagged = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Podcast withoutAnyTags($tags, $includeUntagged = false)
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
