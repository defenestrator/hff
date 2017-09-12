<?php

use App\Map;
use Faker\Factory as Faker;

class MapsTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Map::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
                'zoom' => $faker->numberBetween(1,17),
                'uri' => $faker->url
            ]);
        }
    }

}