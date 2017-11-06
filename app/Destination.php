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
 */
class Destination extends Model
{
    //
}
