<?php

namespace App\Http\Controllers;
use App\Podcast;
use App\Publication;

class PublishedPodcastsController extends ContentController
{
    /**
     * @param Podcast $podcast
     * @param Publication $publication
     * @return $this
     */
    public function index(Podcast $podcast, Publication $publication)
    {
        $published = $publication->all('post_id');
        $podcasts = $podcast->whereIn('id', $published)->paginate(15);
        $smartass = $this->smartass;
        return view('publications.podcasts.index', compact('smartass', 'podcasts'));
    }

    /**
     * @param Podcast $podcast
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Podcast $pod, $slug)
    {
        $podcast = $pod->where('slug', '=', $slug)->first();
        $smartass = $this->smartass;
        return view('publications.podcasts.show', compact('podcast', 'smartass'));
    }
}
