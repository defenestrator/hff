<?php

namespace App\Http\Controllers;

use App\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastsController extends ContentController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Podcast::paginate(50, ['title', 'season', 'episode', 'slug', 'file', 'cover_image', 'created_at']);
    }
    public function upload()
    {
        $files = Storage::disk('DO')->files('podcasts');
        return view('cms.podcasts', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::disk('DO')->putFile('podcasts', request()->file, 'public');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Post $post)
    {
        $request->validate([
            'slug' => 'required|alpha_dash|unique:posts,slug',
            'episode' => 'required',
            'season' => 'required',
            'title' => 'required|min:2'
        ]);
        return $post->create([
            'slug'  => $request->slug,
            'episode' => $request->episode,
            'season'  => $request->season,
            'title' => $request->title,
            'file' => $request->upload
        ])->tag($request->tags);
    }
}
