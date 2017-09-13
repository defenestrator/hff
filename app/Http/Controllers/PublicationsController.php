<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    /**
     * @param Request $request
     * @param Publication $publication
     * @return mixed
     */
    public function create(Request $request, Publication $publication)
    {
        $request->validate([
            'type' => 'required|min:2'
        ]);

        return $publication->create($request->all([]));
    }

    /**
     * @param Publication $publication
     * @param $id
     * @return int
     */
    public function destroy(Publication $publication, $id)
    {
        return $publication->destroy($id);
    }
}
