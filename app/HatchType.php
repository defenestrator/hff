<?php

namespace App;

use Doctrine\Common\Cache\PredisCache;
use Illuminate\Database\Eloquent\Model;

/**
 * HatchType
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\Prey[] $prey
 * @method static \Illuminate\Database\Query\Builder|\HatchType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\HatchType whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\HatchType whereDescription($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HatchType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HatchType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HatchType extends Model
{
    protected $fillable = ['type', 'description'];

    public $timestamps = false;

    public function prey()
    {
        return $this->hasMany(Prey::class);
    }

    public function hatches()
    {
        return $this->belongTo(Hatch::class);
    }
}
