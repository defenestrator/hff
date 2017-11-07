<?php

namespace App\Http\Controllers;

class MissingTeamController extends Controller
{
    /**
     * Show the missing team notice.
     *
     * @return Response
     */
    public function show()
    {
        return view('missing-team');
    }
}
