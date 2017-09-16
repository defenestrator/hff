<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactFormMessage
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email_address
 * @property string $message
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactFormMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactFormMessage whereEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactFormMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactFormMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactFormMessage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ContactFormMessage whereUpdatedAt($value)
 */
class ContactFormMessage extends Model
{
    protected $fillable = [
        'name',
        'email_address',
        'message'
    ];

}
