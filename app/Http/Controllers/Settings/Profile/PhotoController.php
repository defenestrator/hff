<?php

namespace App\Http\Controllers\Settings\Profile;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Spark\Http\Controllers\Controller;

class PhotoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * The image manager instance.
     *
     * @var ImageManager
     */
    protected $images;

    /**
     * PhotoController constructor.
     * @param ImageManager $images
     */
    public function __construct(ImageManager $images)
    {
        $this->images = $images;
        $this->middleware('auth');
    }

    /**
     * Store the user's profile photo.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->handle(
            $request->user(), $request->all()
        );
    }
    /**
     * {@inheritdoc}
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'photo' => 'required|image|max:4000',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, array $data)
    {
        $file = $data['photo'];

        $path = $file->hashName('images/profiles');

        $disk = Storage::disk('s3');

        $disk->put(
            $path, $this->formatImage($file), 'public'
        );

        $oldPhotoUrl = $user->photo_url;

        $user->forceFill([
            'photo_url' => $disk->url($path),
        ])->save();

        if (preg_match('/images\/profiles\/(.*)$/', $oldPhotoUrl, $matches)) {
            $disk->delete('images/profiles/'.$matches[1]);
        }
    }

    /**
     * Resize an image instance for the given file.
     *
     * @param  \SplFileInfo  $file
     * @return \Intervention\Image\Image
     */
    protected function formatImage($file)
    {
        return (string) $this->images->make($file->path())
            ->fit(300)->encode();
    }
}
