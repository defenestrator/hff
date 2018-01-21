<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Region;
use App\Destination;
use App\Showcase;
use App\Post;

class ContentComposer {

    protected $regions;
    protected $destinations;
    protected $showcases;
    protected $posts;

    public function __construct(Region $region, Showcase $showcase, Destination $destination, Post $post)
    {
        $this->destinations= $destination;
        $this->regions = $region;
        $this->showcases = $showcase;
        $this->posts = $post;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('showcases', $this->showcases->whereHas('publication')->orderBy('updated_at', 'desc')->get());
        $view->with('destinations', $this->destinations->all());
        $view->with('regions', $this->regions->all()->sortBy('name'));
        $view->with('posts', $this->posts->whereHas('publication')->orderBy('created_at', 'desc')->get());
    }

}