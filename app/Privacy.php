<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Privacy
 *
 * @property integer $id
 * @property string $privacy
 * @method static \Illuminate\Database\Query\Builder|\Privacy whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Privacy wherePrivacy($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @mixin \Eloquent
 */
class Privacy extends Model
{
    protected $guarded = ['privacy'];
    public $timestamps = false;
    protected $table = 'privacy';
}
