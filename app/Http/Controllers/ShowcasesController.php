<?php

namespace App\Http\Controllers;

use App\Showcase;

class ShowcasesController extends Controller
{
    public function index()
    {
        $pagetitle = 'Destination Showcases';
        return view('showcases.index', compact('pagetitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.showcases');
    }

    /**
     * @param Showcase $showcase
     * @param $id
     * @return \App\Publication|mixed
     */
    public function show(Showcase $showcase, $id)
    {
        return $showcase->where('id', $id)->first()->publication;
    }

}
