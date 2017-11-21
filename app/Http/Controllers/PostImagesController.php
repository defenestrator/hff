<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class PostImagesController extends Controller
{
    public function create(Request $request)
    {
            $request->validate([
                'image' => 'required|image'
            ]);
            $path = Storage::disk('public')->putFile('images', $request->file('image'));

            return response()->json([ 'file' => Storage::disk('public')->url($path), 'success' => true, ]);
    }


}
