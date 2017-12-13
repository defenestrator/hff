<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\Slugger;
use App\Showcase;
class ContentController extends Controller
{
    protected $slugger;
    public $smartass = '';
    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;
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
