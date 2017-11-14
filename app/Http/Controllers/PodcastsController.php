<?php

namespace App\Http\Controllers;

use App\Podcast;
use GuzzleHttp;
use Illuminate\Support\Facades\Cache;
class PodcastsController extends ContentController
{
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $feed = Cache::get('podcast_feed-'. date('Y-m-d'));
//            dd($feed['items']);
            return view('publications.podcasts.index', [
                'title' => $feed['title'],
                'description' => $feed['description'],
                'tagline' => $feed['_fireside']['subtitle'],
                'episodes' => $feed['items']]);
        } catch(Exception $error) {
            log('Unable to retrieve podcast feed, reason: ' , $error);
            return 'Sorry, something must have fucked up' ."\n";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        //
    }
}