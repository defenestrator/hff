<?php namespace App\Http\Controllers;

/**
 * Class FishSpeciesController
 * @package App\Http\Controllers
 */
class FishSpeciesController extends ContentController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $dev = $this->developer();

        return view('cms.fish-species', ['dev' => $dev]);
    }
}
