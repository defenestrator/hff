<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Showcase;
use App\Region;

class SearchApiController extends Controller
{
    public function filter(Post $post, Showcase $showcase, Region $region, Request $request)
    {
        $q = $request->get('query');
        $queriedPosts = $post->search($q)->orderBy('created_at', 'desc')->get()->map(function($post) {
            $post['type'] = 'Blog Post';
            $post['link'] = '/publications/posts/'. $post['slug'];
            return $post;
        });
        $posts = $queriedPosts->whereIn('publication', true);

        $queriedShowcases = $showcase->search($q)->orderBy('created_at', 'desc')->get()->map(function($showcase) {
            $showcase['type'] = 'Fly Fishing Destination';
            $showcase['link'] = '/showcases/'. $showcase['slug'];
            return $showcase;
        });
        $showcases = $queriedShowcases->whereIn('publication', true);

        $regions = $region->search($q)->orderBy('created_at', 'desc')->get()->map(function($region) {
            $region['type'] = 'Region';
            $region['title'] = $region['name'];
            $region['link'] = '/regions/'. $region['slug'];
            $region['header_photo'] = 'https://images.fireside.fm/podcasts/images/e/e806aded-313d-462f-9181-8447502bda33/episodes/3/3c5758b3-7c00-4221-b3f8-8636e5c36448/header.jpg';
            return $region;
        });

        $results = $showcases->merge($posts)->merge($regions)->sortByDesc('created_at');
        return $results;
    }
}
