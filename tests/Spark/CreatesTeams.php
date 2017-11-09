<?php
namespace Tests\Spark;

use Ramsey\Uuid\Uuid;
use App\User;
use App\Team;;

trait CreatesTeams
{


    /**
         * Create a new team instance.
         *
         * @return \Laravel\Spark\Team
         */
        public function createTeam($user = null, $role = 'owner')
        {
            $user = $user ?: factory(User::class)->create();

            $team = (new Team)->forceFill([
                'name' => 'New Team',
                'slug' => Uuid::Uuid4(),
                'owner_id' => $user->id,
            ]);

            $user->teams()->save($team, ['role' => $role]);

            return $team->fresh();
        }
}
