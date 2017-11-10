<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use App\Team;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateTeamTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations;

    public function test_name_can_be_updated()
    {
        $team = $this->createTeam();

        $this->actingAs($team->owner)
                ->json('PUT', '/settings/outfitters/'.$team->id.'/name', [
                    'name' => 'Name (Updated)',
                ])->assertStatus(200);

        $this->assertDatabaseHas('teams', [
            'name' => 'Name (Updated)',
        ]);
    }


    public function test_name_is_required()
    {
        $team = $this->createTeam();

        $this->actingAs($team->owner)
                ->json('PUT', '/settings/outfitters/'.$team->id.'/name', [
                    'name' => '',
                ])->assertStatus(422);
    }
}
