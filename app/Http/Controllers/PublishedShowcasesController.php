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
        return view('showcases.show')->with('showcase', $showcase->where('slug', '=', $slug)->first());
    }

    public function redirect($slug)
    {
        return redirect()->action('PublishedShowcasesController@show', $slug, 301);
    }
}
