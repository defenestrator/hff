<?php

namespace App\Http\Controllers;

use App\Showcase;
use Illuminate\Http\Request;

class ShowcasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.showcases.index');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show(Showcase $showcase, $id)
    {
        return $showcase->where('id', $id)->first()->publication;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase $showcase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase $showcase)
    {
        //
    }
}
