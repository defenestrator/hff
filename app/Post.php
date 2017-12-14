<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

/**
 * App\Post
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $author
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post withAnyTags($tags, $type = null)
 * @property-read \App\Publication $publication
 * @property-read array $tag_array
 * @property-read array $tag_array_normalized
 * @property-read string $tag_list
 * @property-read string $tag_list_normalized
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cviebrock\EloquentTaggable\Models\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post isNotTagged()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post isTagged()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post withoutAllTags($tags, $includeUntagged = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post withoutAnyTags($tags, $includeUntagged = false)
 * @property string $header_photo
 * @property int $image_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereHeaderPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereImageId($value)
 */
class Post extends Model
{
    use Taggable;

    protected $fillable = [ 'title', 'slug', 'user_id', 'body', 'author', 'header_photo', 'image_id'];
    protected $publication = null;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function publication()
    {
        return $this->hasOne(Publication::class);
    }

    /**
     * @return mixed
     */
    public function published()
    {
        $published = Publication::where('post_id', '!=', null)->get();
        return $this->whereIn('id', $published->pluck('post_id'))->get();
    }
    /**
     * @return mixed
     */
    public function unPublished()
    {
        $published = Publication::where('post_id', '!=', null)->get();
        return $this->whereNotIn('id', $published->pluck('post_id'))->get();
    }

}
