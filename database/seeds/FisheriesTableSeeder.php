<?php

use App\Fishery;
use App\Privacy;
use App\User;
use App\Habitat;
use Faker\Factory as Faker;

/**
 * Class FisheriesTableSeeder
 */
class FisheriesTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        Fishery::unguard();

        $faker = Faker::create('en-US');
        $habitatIds = Habitat::pluck('id')->all();

        foreach (range(1, 30) as $index) {

            Fishery::create([
                'name' => $faker->sentence(),
                'regs' => $faker->url,
                'management' => $faker->word,
                'notes' => $faker->paragraph(3),
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
                'habitat_id' => $faker->randomElement($habitatIds),
                'stillwater' => $faker->boolean()
            ]);
        }
    }

}