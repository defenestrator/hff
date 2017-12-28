<?php

namespace App\Http\Controllers;
use App\Showcase;
use App\Tag;
use Illuminate\Http\Request;

class ShowcaseTagsController extends ContentController
{
    /**
     * @param Showcase $showcase
     * @param $normalized
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Showcase $showcase, $normalized)
    {
        $tag = $normalized;
        $tagShowcases = $showcase->withAnyTags([$normalized])->orderBy('created_at', 'desc')->get();
        $pagetitle = 'Showcases tagged ' . "'$normalized'";
        return view('showcases.tags', compact('tagShowcases' , 'pagetitle', 'tag'));
    }

    public function show(Showcase $showcase, $id)
    {
        return $showcase->withAllTags([$id])->get();
    }

    public function edit(Showcase $showcase, $id)
    {
        return $showcase->where('id', '=', $id)->first()->tag_array;
    }
}
