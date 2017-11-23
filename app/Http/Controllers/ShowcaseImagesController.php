<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Intervention\Image\Facades\Image;

class ShowcaseImagesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'header_photo' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $image = Storage::disk('public')->putFile('images/showcases', $request->file('header_photo'));
        $resize = Image::make($request->file('header_photo'))
            ->resize(575, 575, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
        $hash = md5($resize->__toString());
        $thumbpath = storage_path('app/public/images/showcases/thumbnail' . "{$hash}.jpg");
        $resize->save($thumbpath);
        return response()->json([
            'thumbnail' => url($thumbpath),
            'header_photo' => Storage::disk('public')->url($image),
            'success' => true,
        ]);
    }


}
