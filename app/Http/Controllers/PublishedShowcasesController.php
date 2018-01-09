<?php

namespace App\Http\Controllers;

use App\Showcase;
use App\Publication;
use Illuminate\Http\Request;

class PublishedShowcasesController extends ContentController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('showcases.index', ['pagetitle' => 'All destination showcases']);
    }

    /**
     * @param Showcase $showcase
     * @param $slug
     * @return $this
     */
    public function show(Showcase $showcase, $slug)
    {
        $title = $this->slugger->titleify($slug);
        $data = new $showcase([
            'special'=> false,
            'slug' => $title ,
            'tagline' => 'Doesn\'t exist' ,
            'thumbnail' => '/images/tangle.jpg',
            'region' => 'utopia' ,
            'fishery_type' => 'noncorporeal' ,
            'sidebar_top' => 'Nothing' ,
            'sidebar_bottom' => 'More nothing' ,
            'header_photo' => '/images/tangle.jpg',
            'body'  => 'There is nothing here, sorry.',
            'title' => "'" . $title . "'",
        ]);
        if ($showcase->where('slug', '=', $slug)->count() > 0) {
            $data = $showcase->where('slug', '=', $slug)->first();
        }
        return view('showcases.show')->with('showcase', $data);
    }

}
