<?php

use App\Privacy;

class PrivacyTableSeeder extends DatabaseSeeder
{

    public function run()
    {
        $privacy_setting = array('Public', 'Private', 'Buddies', 'List');
        foreach ($privacy_setting as $privacy) {
            Privacy::create([
                'privacy' => $privacy
            ]);
        }
    }

}