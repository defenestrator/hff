<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Newsletter
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $subject
 * @property string $body
 * @property string $sent_on
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereSentOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Newsletter whereUpdatedAt($value)
 */
class Newsletter extends Model
{
    protected $fillable = ['body', 'subject', 'sent_on'];

}
