<?php

namespace App\Http\Controllers;
use App\Podcast;
use App\Publication;
use Illuminate\Http\Request;

class PublishedPodcastsController extends Controller
{
    public function index(Podcast $podcast, Publication $publication)
    {
        $published = $publication->all('post_id');
        $podcasts = $podcast->whereIn('id', $published)->paginate(15);
        return view('publications.podcasts.index')->with('podcasts', $podcasts);
    }
}
