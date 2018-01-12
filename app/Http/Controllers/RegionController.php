<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Publication;

class RegionController extends ContentController
{
    /**
     * @param Region $region
     * @param Publication $publication
     * @return $this
     */
    public function index(Region $region, Publication $publication)
    {
        $published = $publication->all('post_id');
        $regions = $region->whereIn('id', $published)->orderBy('created_at', 'desc')->paginate(50);
        $pagetitle = 'Regions around the world';
        return view('regions.index', compact('regions', 'pagetitle'));
    }

    /**
     * @param Region $region
     * @param $slug
     * @return $this
     */
    public function show(Region $region, $slug)
    {
        $title = $this->slugger->titleify($slug);
        $data = new $region([
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
        if ($region->where('slug', '=', $slug)->count() > 0) {
            $data = $region->where('slug', '=', $slug)->first();
        }
        return view('regions.show')->with('region', $data);
    }
}
