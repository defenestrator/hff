<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Destination
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $team_id
 * @property float $lat
 * @property float $lng
 * @property string $name
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $outfitter_id
 * @property int $region_id
 * @property-read \App\Map $map
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Package[] $packages
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereOutfitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Destination whereRegionId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Showcase[] $showcases
 */
class Destination extends Model
{

    protected $fillable= [
        'name',
        'description',
        'lat',
        'lng',
        'outfitter_id',
        'region_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function showcases()
    {
        return $this->hasMany(Showcase::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function map()
    {
        return $this->hasOne(Map::class);
    }
}
