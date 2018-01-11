<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image as ImageModel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function wysiwyg(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
        $builder = $this->build($request->image);

        return $builder;
    }

    public function header(Request $request)
    {
        $request->validate([
            'header_photo' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        return $this->build($request->file('header_photo') );
    }

    public function build($image)
    {
        $thumbnail = $this->thumbnail($image);

        $stamp = $this->stamp($image);

        $resize = Image::make($image)
            ->resize(1280, 1280, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80)->stream();
        $hash = md5($resize->__toString());

        if (config('app.env') == 'production') {
            Storage::disk('s3')->put('/images/'.$hash.'.jpg' , $resize->__toString(), 'public');
            $large =  Storage::disk('s3')->url('images/'.$hash.'.jpg');
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $large =  Storage::disk('local')->url('images/'.$hash.'.jpg');
        }

        $record = ImageModel::create([
            'thumbnail' => $thumbnail,
            'stamp' => $stamp,
            'large' => $large
        ]);
        return response()->json([
            'image_id' => $record->id,
            'thumbnail' => $thumbnail,
            'stamp' => $stamp,
            'large' => $large,
            'success' => true,
        ]);
    }

    public function thumbnail($img)
    {
        $resize = Image::make($img)
            ->resize(575, 575, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80)->stream();
        $hash = md5($resize->__toString());
        if (config('app.env') == 'production') {
            Storage::disk('s3')->put('/images/'.$hash.'.jpg' , $resize->__toString(), 'public');
            $location =  Storage::disk('s3')->url('images/'.$hash.'.jpg');
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $location =  Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $location;
    }

    public function stamp($img)
    {
        $resize = Image::make($img)
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80);
        $hash = md5($resize->__toString());
        if (config('app.env') == 'production') {
            Storage::disk('s3')->put('/images/'.$hash.'.jpg' , $resize->__toString(), 'public');
            $location =  Storage::disk('s3')->url('images/'.$hash.'.jpg');
        } else {
            Storage::disk('local')->put('/public/images/'.$hash.'.jpg' , $resize->__toString());
            $location =  Storage::disk('local')->url('images/'.$hash.'.jpg');
        }
        return $location;
    }
}
