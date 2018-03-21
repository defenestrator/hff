<?php

namespace App;

use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\FishSpecies
 *
 * @property int $id
 * @property string $common_name
 * @property string $genus
 * @property string $species
 * @property string $description
 * @property int $habitat_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Fishery[] $fisheries
 * @property-read \App\Habitat $habitat
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereCommonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereGenus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereHabitatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereSpecies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FishSpecies whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class FishSpecies extends Model
{
    use Taggable;
    protected $fillable = ['common_name', 'genus', 'species', 'description', 'header_photo', 'slug'];


    public function habitat()
    {
        return $this->hasOne(Habitat::class);
    }

    public function fisheries()
    {
        return $this->belongsToMany(Fishery::class);
    }

}
