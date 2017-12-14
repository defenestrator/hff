<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Image
 *
 * @property int $id
 * @property string $large
 * @property string $thumbnail
 * @property string $stamp
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereLarge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    protected $fillable = ['thumbnail', 'large', 'stamp'];
}
