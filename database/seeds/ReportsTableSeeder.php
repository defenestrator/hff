<?php

use App\Report;
use App\Privacy;
use App\User;
use App\Fishery;
use Faker\Factory as Faker;

class ReportsTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $faker = Faker::create();
        $privacyIds = Privacy::pluck('id')->all();
        $userIds = User::pluck('id')->all();
        $fisheryIds = Fishery::pluck('id')->all();

        foreach (range(1, 30) as $index) {
            Report::create([
                'user_id' => $faker->randomElement($userIds),
                'fishery_id' => $faker->randomElement($fisheryIds),
                'start_time' => $faker->dateTimeThisYear(),
                'end_time' => $faker->dateTimeThisYear(),
                'title' => $faker->sentence(),
                'report_body' => $faker->paragraph(),
                'privacy_id' => $faker->randomElement($privacyIds)
            ]);
        }
    }

}