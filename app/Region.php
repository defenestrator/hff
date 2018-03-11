<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\Region
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $geojson
 * @property float|null $lat
 * @property float|null $lng
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Destination[] $destinations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereGeojson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Showcase[] $showcases
 */
class Region extends Model
{
    use Searchable;

    protected $fillable = [
        'geojson', 'lat','lng','name', 'slug'
    ];
    protected $table = 'regions';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
    public function showcases()
    {
        return $this->hasMany(Showcase::class);
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
