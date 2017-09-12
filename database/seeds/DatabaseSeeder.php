<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    private $user;
    function __construct(User $user) {
        $this->user = $user;
    }
    private $tables = [
        'fisheries',
        'fishery_fish_species',
        'fishery_hatches',
        'fish_species',
        'flyboxes',
        'fly_patterns',
        'habitats',
        'hatches',
        'hatch_reports',
        'hatch_types',
        'maps',
        'prey',
        'reports',
        'water_data',
        'weather'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (App::environment() !== 'local') {
            die(PHP_EOL . 'Don\'t get yourself fired, silly.' . PHP_EOL);
        }

        $this->cleanDatabase();

        Model::unguard();

        $this->user->create([
            'email'     => 'jeremyblc@gmail.com',
            'password'  => bcrypt(env('JEREMY_PASSWORD')) ,
            'name'      => 'Jeremy Anderson'
        ]);

        $this->user->create([
            'email'     => 'dgflatspirate@gmail.com',
            'password'  => bcrypt(env('DAVE_PASSWORD')),
            'name'      => 'Dave Gourley'
        ]);

        $this->call(PrivacyTableSeeder::class);
        $this->command->info('Privacy table seeded!');

        $this->call(HabitatsTableSeeder::class);
        $this->command->info('Habitats table seeded!');

        $this->call(HatchTypesTableSeeder::class);
        $this->command->info('HatchTypes table seeded!');

        $this->call(MapsTableSeeder::class);
        $this->command->info('Maps table seeded!');

        $this->call(WaterDataTableSeeder::class);
        $this->command->info('Waterdata table seeded!');

        $this->call(WeatherTableSeeder::class);
        $this->command->info('Weather table seeded!');

        $this->call(FisheriesTableSeeder::class);
        $this->command->info('Fisheries table seeded!');

        $this->call(HatchesTableSeeder::class);
        $this->command->info('Hatches table seeded!');

        $this->call(PreyTableSeeder::class);
        $this->command->info('Prey table seeded!');

        $this->call(ReportsTableSeeder::class);
        $this->command->info('Trip Reports table seeded!');

        $this->call(FlyPatternsTableSeeder::class);
        $this->command->info('FlyPatterns table seeded!');

        $this->call(HatchReportsTableSeeder::class);
        $this->command->info('Fishery table seeded!');

        $this->call(FishSpeciesTableSeeder::class);
        $this->command->info('Fish Species table seeded!');

        $this->call(FlyboxesTableSeeder::class);
        $this->command->info('Flyboxes table seeded!');

        $this->call(LookupTableSeeder::class);
        $this->command->info('Lookup tables seeded!');

    }

    private function cleanDatabase()
    {
        foreach ($this->tables as $tableName) {
            DB::table($tableName)->delete();
        }
    }
}
