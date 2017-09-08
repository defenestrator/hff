<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Hobo Fly Fishing, LLC ',
        'product' => 'HoboFlyFishing.com',
        'street' => '289 N Hullen Place',
        'location' => 'Star, ID 83669',
        'phone' => '(208) 859-9133',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'jeremyblc@gmail.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'jeremyblc@gmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::identifyTeamsByPath();
        Spark::useStripe()->needsCardUpFront();

        Spark::teamPlan('Monthly', 'larryville-monthly')
            ->price(5)
            ->features([
                'One',
                'Two',
                'Three'
            ]);
        Spark::teamPlan('Annual', 'larryville-annual')->price(50)
            ->features([
                'One',
                'Two',
                'Three',
                'Save $10 by signing up for an annual subscription.'
            ])
            ->yearly();

        Spark::freePlan('Free to all Anglers!');
    }

    public function register()
    {
        Spark::referToTeamAs('outfitter');
    }
}

