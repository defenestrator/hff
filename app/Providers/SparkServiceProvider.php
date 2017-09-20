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
        Spark::identifyTeamsByPath();
        Spark::useStripe()->teamTrialDays(10);

        Spark::teamPlan('Standard Monthly Outfitter Listing', 'hobo-basic-monthly')
            ->price(5)
            ->maxTeams(1)
            ->features([
                'Basic listing for your company',
                'Our cut is only $25 per booking!',
                'Customers book and pay here',
                'Skip the office-work hassle',
                'We promote your brand'
            ]);
        Spark::teamPlan('Standard Yearly Outfitter Listing', 'hobo-basic-annual')
            ->price(50)
            ->maxTeams(1)
            ->features([
                'Save 20% by paying yearly.',
                'Basic listing for your company',
                'Our cut is only $25 per booking!',
                'Customers book and pay here',
                'Skip the office-work hassle',
                'We promote your brand'
            ])
            ->yearly();

        Spark::freePlan('Free to all Anglers!');
        Spark::afterLoginRedirectTo('dashboard');
    }

    public function register()
    {
        Spark::referToTeamAs('outfitter');
    }
}

