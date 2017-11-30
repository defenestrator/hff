<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image as ImageModel;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'header_photo' => 'required|mimes:jpg,jpeg,png'
        ]);

        $thumbnail = $this->thumbnail($request->file('header_photo'));

        $stamp = $this->stamp($request->file('header_photo'));

        $resize = Image::make($request->file('header_photo'))
            ->resize(1280, 1280, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');
        $hash = md5($resize->__toString());
        $path = storage_path('app/public/images/' . "{$hash}.jpg");
        $resize->save($path);
        $header_photo = url('storage/images/' . "{$hash}.jpg");
        ImageModel::create([
            'thumbnail' => $thumbnail,
            'stamp' => $stamp,
            'large' => $header_photo
        ]);
        return response()->json([
            'thumbnail' => $thumbnail,
            'stamp' => $stamp,
            'header_photo' => url('storage/images/' . "{$hash}.jpg"),
            'success' => true,
        ]);
    }

    public function thumbnail($img)
    {
        $resize = Image::make($img)
            ->resize(575, 575, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
        $hash = md5($resize->__toString());
        $thumbpath = storage_path('app/public/images/' . "{$hash}.jpg");
        $resize->save($thumbpath);
        return url('storage/images/' . "{$hash}.jpg");
    }

    public function stamp($img)
    {
        $resize = Image::make($img)
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
        $hash = md5($resize->__toString());
        $thumbpath = storage_path('app/public/images/' . "{$hash}.jpg");
        $resize->save($thumbpath);
        return url('storage/images/' . "{$hash}.jpg");
    }
}
