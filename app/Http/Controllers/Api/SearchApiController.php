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
        $posts = $post->search($request->get('query'))->orderBy('created_at', 'desc')->get()->map(function($post) {
            $post['type'] = 'Blog Post';
            $post['link'] = '/publications/posts/'. $post['slug'];
            return $post;
        });
        $showcases = $showcase->search($request->get('query'))->orderBy('created_at', 'desc')->get()->map(function($showcase) {
            $showcase['type'] = 'Fly Fishing Destination';
            $showcase['link'] = '/publications/showcases/'. $showcase['slug'];
            return $showcase;
        });
        $regions = $region->search($request->get('query'))->orderBy('created_at', 'desc')->get()->map(function($region, $q) {
            $region['type'] = 'Region';
            $region['title'] = $region['name'];
            $region['link'] = '/regions/'. $region['slug'];
            $region['header_photo'] = 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/authenticated_hobo.png';
            return $region;
        });

        $results = $showcases->merge($posts)->merge($regions)->sortByDesc('created_at');
        // If there are results return them, if none, return the error message.
        return $results;
    }
}
