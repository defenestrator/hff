<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Region;
use App\Destination;
use App\Showcase;

class ContentComposer {

    protected $regions;
    protected $destinations;
    protected $showcases;

    public function __construct(Region $region, Showcase $showcase, Destination $destination)
    {
        $this->destinations= $destination;
        $this->regions = $region;
        $this->showcases = $showcase;
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
    }

}