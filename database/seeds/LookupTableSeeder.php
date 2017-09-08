<?php

use App\User;
use App\Tag;
use App\TripReport;
use App\Hatch;
use App\Fishery;
use App\FishSpecies;
use App\Role;
use App\Comment;

use Faker\Factory as Faker;

class LookupTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->all();
        $hatchIds = Hatch::pluck('id')->all();
        $fisheryIds = Fishery::pluck('id')->all();
        $fishSpeciesIds = FishSpecies::pluck('id')->all();

        foreach (range(1, 30) as $index) {
            DB::table('fishery_fish_species')->insert([
                'fishery_id' => $faker->randomElement($fisheryIds),
                'fish_species_id' => $faker->randomElement($fishSpeciesIds)
            ]);

            DB::table('fishery_hatch')->insert([
                'fishery_id' => $faker->randomElement($fisheryIds),
                'hatch_id' => $faker->randomElement($hatchIds)
            ]);
        }
    }
}