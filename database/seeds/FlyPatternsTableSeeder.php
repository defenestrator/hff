<?php

use App\FlyPattern;
use App\Privacy;
use App\User;
use Faker\Factory as Faker;

class FlyPatternsTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->all();

        foreach (range(1, 30) as $index) {
            FlyPattern::create([
                'user_id' => $faker->randomElement($userIds),
                'name' => $faker->name,
                'recipe' => $faker->paragraph(),
                'instructions' => $faker->paragraph(),
                'image_id' => $faker->numberBetween(1, 30)
            ]);
        }
    }

}