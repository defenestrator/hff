<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Expedition
 *
 * @property int $id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $package_id
 * @property string $type
 * @property int $num_days
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition whereNumDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expedition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Expedition extends Model
{
    //
}
