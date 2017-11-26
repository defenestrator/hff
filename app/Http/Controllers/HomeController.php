<?php

namespace App\Http\Controllers;
use App\Showcase;
use App\Publication;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $showcase;
    protected $publication;
    /**
     * HomeController constructor.
     */
    public function __construct(Showcase $showcase, Publication $publication)
    {
        $this->publication = $publication;
        $this->showcase = $showcase;
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $published = $this->publication->all('showcase_id');
        $showcases = $this->showcase->whereIn('id', $published)->orderBy('created_at', 'desc')->paginate(27);
        return view('home', compact('showcases'));
    }
}
