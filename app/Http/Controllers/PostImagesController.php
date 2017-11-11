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
            $path = Storage::disk('DO')->putFile('images', $request->file('image'), 'public');

            return response()->json(['file' => Storage::disk('DO')->url($path), 'success' => true, ]);
    }


}
