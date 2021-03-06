<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('purgelog')
            ->environments(['production'])
            ->weeklyOn( 7 , '02:00')
            ->thenPing('http://beats.envoyer.io/heartbeat/vlmAZjSlnZRi4q9');

        $schedule->command('backup:run')
            ->environments(['production'])
            ->twiceDaily()
            ->thenPing('http://beats.envoyer.io/heartbeat/g3nDXfWLuLTQQ8f');

        $schedule->command('sitemap')
            ->environments(['production'])
            ->dailyAt('03:00')
            ->thenPing('http://beats.envoyer.io/heartbeat/JvGR9IUR1XPQbxg');

        $schedule->command('reheat')
            ->environments(['production'])
            ->dailyAt('04:00')
            ->thenPing('http://beats.envoyer.io/heartbeat/Pmeg8HGRelhFZug');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
