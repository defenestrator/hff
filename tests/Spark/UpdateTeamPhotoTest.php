<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use App\Team;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Storage;

class UpdateTeamPhotoTest extends TestCase
{
    use DatabaseMigrations;

    public function test_team_photo_can_be_updated()
    {
        $user = factory(User::class)->create();

        $team = (new Team)->forceFill([
            'name' => 'New Team',
            'owner_id' => $user->id,
        ]);

        $user->teams()->save($team, ['role' => 'owner']);

        $file = new UploadedFile(
            public_path('images/hobo.png'), 'hobo.png', 'image/png', null, null, true
        );

        Storage::shouldReceive('disk')
                        ->once()
                        ->with('public')
                        ->andReturn($disk = Mockery::mock('StdClass'));

        $disk->shouldReceive('put');
        $disk->shouldReceive('url')->once()->andReturn('/team/photo');

        $this->actingAs($user)
                ->json('POST', '/settings/outfitters/'.$team->id.'/photo', [
                    'photo' => $file,
                ])->assertStatus(200);

        $this->assertDatabaseHas('teams', [
            'photo_url' => '/team/photo',
        ]);
    }
}
