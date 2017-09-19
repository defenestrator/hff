<?php

use Faker\Generator as Faker;

$factory->define(App\Podcast::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug(),
        'season' => $faker->numberBetween(1,4),
        'episode' => $faker->numberBetween(1,50),
        'file' => $faker->file(),
        'cover_image' => $faker->imageUrl(),
        'notes' => $faker->paragraphs()
    ];
});
