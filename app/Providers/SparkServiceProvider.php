<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Exceptions\IneligibleForPlan;
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
    protected $sendSupportEmailsTo = 'jeremy@hoboflyfishing.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'jeremyblc@gmail.com',
        'travhill1@gmail.com' ,
        'phillipsrog@gmail.com',
        'dgflatspirate@gmail.com'
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
        Spark::useStripe()->noCardUpFront();
        Spark::freePlan('Free Angler Plan', 'free-angler-plan')->maxTeams(0);
        Spark::afterLoginRedirectTo('dashboard');
        Spark::identifyTeamsByPath();
    }

    public function register()
    {
        Spark::referToTeamAs('outfitter');
    }
}

