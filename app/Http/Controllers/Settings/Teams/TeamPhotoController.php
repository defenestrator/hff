<?php

namespace App\Http\Controllers\Settings\Teams;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Spark\Http\Controllers\Controller;

class TeamPhotoController extends Controller
{
    /**
     * The image manager instance.
     *
     * @var ImageManager
     */
    protected $images;

    /**
     * Create a new interaction instance.
     *
     * @param  ImageManager  $images
     * @return void
     */
    public function __construct(ImageManager $images)
    {
        $this->images = $images;
        $this->middleware('auth');
    }

    /**
     * Update the given team's photo.
     *
     * @param  UpdateTeamPhotoRequest  $request
     * @param  \Laravel\Spark\Team  $team
     * @return Response
     */
    public function update(Request $request, $team)
    {
        $this->handle(
            $team, $request->all()
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
    public function handle($team, array $data)
    {
        $file = $data['photo'];

        $path = $file->hashName('images/teams');

        // We will store the profile photos on the "public" disk, which is a convention
        // for where to place assets we want to be publicly accessible. Then, we can
        // grab the URL for the image to store with this user in the database row.
        $disk = Storage::disk('s3');

        $disk->put(
            $path, $this->formatImage($file), 'public'
        );

        $oldPhotoUrl = $team->photo_url;

        $team->forceFill([
            'photo_url' => $disk->url($path),
        ])->save();

        if (preg_match('/images\/teams\/(.*)$/', $oldPhotoUrl, $matches)) {
            $disk->delete('images/teams/'.$matches[1]);
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
