<?php

use App\HatchReport;
use App\Report;;
use App\Hatch;
use Faker\Factory as Faker;

class HatchReportsTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        $faker = Faker::create('en-US');
        $reportIds = Report::pluck('id')->all();
        $hatchIds = Hatch::pluck('id')->all();
        foreach (range(1, 30) as $index) {
            HatchReport::create([
                'report_id' => $faker->randomElement($reportIds),
                'hatch_id' => $faker->randomElement($hatchIds),
                'start_time' => $faker->dateTimeThisYear(),
                'end_time' => $faker->dateTimeThisYear(),
                'headline' => $faker->sentence(),
                'hatch_report' => $faker->paragraph(),
                'hatch_intensity' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}