<?php

namespace App\Http\Controllers;

use App\Transformers\Slugger;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    protected $slugger;

    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;

    }

    public function developer()
    {
        if (Spark::developer(Auth::user()->email)){
            return true;
        }
        return false;
    }
}
