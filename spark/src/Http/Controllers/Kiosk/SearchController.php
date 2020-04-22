<?php

namespace Laravel\Spark\Http\Controllers\Kiosk;

use Laravel\Spark\Spark;
use Illuminate\Http\Request;
use Laravel\Spark\Http\Controllers\Controller;
use Laravel\Spark\Contracts\Repositories\UserRepository;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('dev');
    }

    /**
     * Get the users based on the incoming search query.
     *
     * @param  Request  $request
     * @return Response
     */
    public function performBasicSearch(Request $request)
    {
        $query = Str::replace('*', '%', $request->input('query'));

        return Spark::interact(UserRepository::class.'@search', [
            $query, $request->user()
        ]);
    }
}
