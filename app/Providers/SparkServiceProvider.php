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
        Spark::freeTeamPlan('Free Plan')->maxTeams(10)->yearly();
        Spark::plan('Outfitter Basic Membership', 'outfitter-basic')
            ->trialDays(10)
            ->maxTeams(1)
            ->price(20);
        Spark::plan('Secret Gold Business Owner Plan', 'secret-gold-admin')
            ->price(0)
            ->yearly();
        Spark::afterLoginRedirectTo('dashboard');
    }

    public function register()
    {
        Spark::referToTeamAs('outfitter');
    }
}

