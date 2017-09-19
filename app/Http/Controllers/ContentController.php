<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public $smartass = '';
    public function __construct()
    {
        $buttonDialogs = [
            'Yeah, but here\'s the thing&hellip;',
            'Have your say',
            'Chime in!',
            'Say something&hellip;',
            'Leave a Comment',
            'New Comment',
            'Join the Conversation'
        ];
        $this->smartass = $buttonDialogs[mt_rand(0, count($buttonDialogs) -1)];

    }
}
