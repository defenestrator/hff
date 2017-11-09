<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Deployment
 *
 * @property int $id
 * @property string $payload
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Deployment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Deployment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Deployment wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Deployment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deployment extends Model
{
    protected $fillable = ['payload'];
}
