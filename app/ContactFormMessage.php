<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFormMessage extends Model
{
    protected $fillable = [
        'name',
        'email_address',
        'message'
    ];

}
