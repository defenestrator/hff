<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * FlyPattern
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $recipe
 * @property string $instructions
 * @property integer $privacy_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Asset[] $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tag[] $tags
 * @property-read \Privacy $privacy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereRecipe($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereInstructions($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern wherePrivacyId($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\FlyPattern whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\$related[] $morphedByMany
 * @mixin \Eloquent
 */
class FlyPattern extends Model
{
    protected $fillable = ['name', 'recipe', 'instructions', 'privacy'];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function privacy()
    {
        return $this->hasOne(Asset::class);
    }

}