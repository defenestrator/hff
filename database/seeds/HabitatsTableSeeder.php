<?php

use App\Habitat;

class HabitatsTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $habitats = ['Saltwater', 'Freshwater', 'Brackish', 'Diadromous'];
        foreach ($habitats as $habitat) {
            Habitat::create([
                'habitat' => $habitat
            ]);
        }
    }

}