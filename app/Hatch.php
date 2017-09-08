<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Hatch
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $hatch_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\Fishery[] $fisheries
 * @property-read \HatchType $hatchType
 * @method static \Illuminate\Database\Query\Builder|\Hatch whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Hatch whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Hatch whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Hatch whereHatchTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Hatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Hatch whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @mixin \Eloquent
 */
class Hatch extends Model
{
    protected $fillable = ['name', 'description'];

    public function fisheries()
    {
        return $this->belongsToMany(Fishery::class);
    }

    public function hatchType()

    {
        return $this->hasOne(HatchType::class);
    }
}


