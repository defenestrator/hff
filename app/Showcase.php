<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
/**
 * App\Showcase
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $outfitter_id
 * @property string|null $outfitter_name
 * @property string $body
 * @property string|null $sidebar_bottom
 * @property string|null $sidebar_top
 * @property string|null $tagline
 * @property string|null $fishery_type
 * @property string|null $region
 * @property string|null $thumbnail
 * @property string|null $header_photo
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read array $tag_array
 * @property-read array $tag_array_normalized
 * @property-read string $tag_list
 * @property-read string $tag_list_normalized
 * @property-read \App\Publication $publication
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cviebrock\EloquentTaggable\Models\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase isNotTagged()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase isTagged()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereFisheryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereHeaderPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereOutfitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereOutfitterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereSidebarBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereSidebarTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereTagline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase withAllTags($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase withAnyTags($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase withoutAllTags($tags, $includeUntagged = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase withoutAnyTags($tags, $includeUntagged = false)
 * @mixin \Eloquent
 */
class Showcase extends Model
{
    use Taggable;
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
        'header_photo',
        'image_id',
        'special'
    ];

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
        $published = Publication::where('showcase_id', '!=', null)->get();
        return $this->whereIn('id', $published->pluck('showcase_id'))->get();
    }
    /**
     * @return mixed
     */
    public function unPublished()
    {
        $published = Publication::where('showcase_id', '!=', null)->get();
        return $this->whereNotIn('id', $published->pluck('showcase_id'))->get();
    }
}
