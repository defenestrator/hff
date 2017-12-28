<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the user's profile details.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'bio' => 'required|min:8',
        ]);

        $request->user()->forceFill([
            'bio' => $request->bio
        ])->save();
    }
}
