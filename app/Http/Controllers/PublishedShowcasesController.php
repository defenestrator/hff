<?php

namespace App\Http\Controllers;

use App\Showcase;
use App\Publication;
use Illuminate\Http\Request;

class PublishedShowcasesController extends ContentController
{
    /**
     * @param Showcase $showcase
     * @param Publication $publication
     * @return $this
     */
    public function index(Showcase $showcase, Publication $publication)
    {
        $published = $publication->all('post_id');
        $showcases = $showcase->whereIn('id', $published)->orderBy('created_at', 'desc')->paginate(50);
        return view('publications.showcases.index', compact('showcases'));
    }

    /**
     * @param Showcase $showcase
     * @param $slug
     * @return $this
     */
    public function show(Showcase $showcase, $slug)
    {
        $data = $showcase->where('slug', '=', $slug)->first();
        return view('showcases.show')->with('showcase', $data);
    }

}
