<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTeamTest extends TestCase
{
    use DatabaseMigrations;

    public function test_teams_can_be_created()
    {
        $this->actingAs(factory(User::class)->create())
                ->json('POST', '/settings/outfitters', [
                    'name' => 'New Team',
                    'slug' => 'new-team'
                ])->assertStatus(200);

        $this->assertDatabaseHas('teams', [
            'name' => 'New Team',
        ]);
    }


    public function test_name_is_required()
    {
        $this->actingAs(factory(User::class)->create())
                ->json('POST', '/settings/outfitters', [
                    'name' => '',
                ])->assertStatus(422);

    }
}
