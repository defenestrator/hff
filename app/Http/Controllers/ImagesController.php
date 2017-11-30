<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'header_photo' => 'required|mimes:jpg,jpeg,png,gif|dimensions:min_width=575,max_width=2800,min_height=575,max_height=2800'
        ]);

        $image = Storage::disk('public')->putFile('images', $request->file('header_photo'));
        $resize = Image::make($request->file('header_photo'))
            ->resize(575, 575, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
        $hash = md5($resize->__toString());
        $thumbpath = storage_path('app/public/images/' . "{$hash}.jpg");
        $resize->save($thumbpath);
        return response()->json([
            'thumbnail' => url('storage/images/'. "{$hash}.jpg"),
            'header_photo' => Storage::disk('public')->url($image),
            'success' => true,
        ]);
    }


}
