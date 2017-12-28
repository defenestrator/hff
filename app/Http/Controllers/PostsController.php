<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Auth;
class PostsController extends ContentController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $dev = 'no';
        if (Spark::developer(Auth::user()->email)){
            $dev = 'yes';
        }
        return view('cms.posts', ['dev' => $dev]);
    }
}
