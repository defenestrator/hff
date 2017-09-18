<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Trip
 *
 * @mixin \Eloquent
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Trip whereUpdatedAt($value)
 */
class Trip extends Model
{
    //
}
