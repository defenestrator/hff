<?php

use App\Asset;
use App\Privacy;
use App\User;
use Faker\Factory as Faker;

class AssetsTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $faker = Faker::create();

        $privacyIds = Privacy::pluck('id')->all();
        $userIds = User::pluck('id')->all();

        foreach (range(1, 30) as $index) {
            Asset::create([
                'type' => $faker->numberBetween($min = 1, $max = 4),
                'user_id' => $faker->randomElement($userIds),
                'uri' => $faker->url,
                'privacy_id' => $faker->randomElement($privacyIds)
            ]);
        }
    }

}