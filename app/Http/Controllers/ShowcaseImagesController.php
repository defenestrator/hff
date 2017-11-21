<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class ShowcaseImagesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'header_photo' => 'required|mimes:jpg,jpeg,png,gif'
        ]);
        $path = Storage::disk('public')->putFile('images', $request->file('header_photo'));

        return response()->json([ 'header_photo' => Storage::disk('public')->url($path), 'success' => true, ]);
    }


}
