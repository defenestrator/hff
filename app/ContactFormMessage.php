<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ContactFormMessage
 *
 * @mixin \Eloquent
 */
class ContactFormMessage extends Model
{
    protected $fillable = [
        'name',
        'email_address',
        'message'
    ];

}
