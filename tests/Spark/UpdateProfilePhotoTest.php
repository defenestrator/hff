<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Storage;
use Mockery;
class UpdateProfilePhotoTest extends TestCase
{
    use DatabaseMigrations;

    public function test_profile_photo_can_be_updated()
    {
        $file = new UploadedFile(
            public_path('images/hobo.png'), 'hobo.png', 'image/png', null, null, true
        );

        Storage::shouldReceive('disk')
                        ->once()
                        ->with('public')
                        ->andReturn($disk = Mockery::mock('StdClass'));

        $disk->shouldReceive('put');
        $disk->shouldReceive('url')->once()->andReturn('/profile/photo');

        $this->actingAs(factory(User::class)->create())
                ->json('POST', '/settings/photo', [
                    'photo' => $file,
                ])->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'photo_url' => '/profile/photo',
        ]);
    }
}
