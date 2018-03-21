<?php

namespace App\Http\Controllers;

class PostsController extends ContentController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $dev = $this->developer();

        return view('cms.posts', ['dev' => $dev]);
    }
}
