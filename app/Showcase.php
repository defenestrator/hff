<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Laravel\Scout\Searchable;
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
 * @property string $lodge_logo
 * @property int $image_id
 * @property int $special
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereLodgeLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereSpecial($value)
 * @property int $destination_id
 * @property int $region_id
 * @property string|null $homepage_top
 * @property string|null $homepage_bottom
 * @property-read \App\Destination $destination
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereDestinationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereHomepageBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereHomepageTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Showcase whereRegionId($value)
 */
class Showcase extends Model
{
    use Taggable;
    use Searchable;
    protected $fillable = [
        'title',
        'slug',
        'destination_id',
        'outfitter_id',
        'outfitter_name',
        'body',
        'sidebar_bottom',
        'sidebar_top',
        'homepage_top',
        'homepage_bottom',
        'tagline',
        'fishery_type',
        'region_id',
        'thumbnail',
        'header_photo',
        'image_id',
        'special'
    ];

    public function destination()
    {
        return $this->hasOne(Destination::class);
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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
