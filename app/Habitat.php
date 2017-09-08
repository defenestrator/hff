<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Habitat
 *
 * @property integer $id
 * @property string $habitat
 * @property-read \Illuminate\Database\Eloquent\Collection|\FishSpecies[] $fishSpecies
 * @method static \Illuminate\Database\Query\Builder|\Habitat whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Habitat whereHabitat($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @mixin \Eloquent
 */

class Habitat extends Model
{
    protected $fillable = ['habitat'];
    public $timestamps = false;

    public function fishSpecies()
    {
        return $this->belongsToMany(FishSpecies::class);
    }
}
