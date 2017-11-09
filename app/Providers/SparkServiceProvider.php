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
        Spark::freePlan('Free Angler Plan', 'free-angler-plan');
        Spark::afterLoginRedirectTo('dashboard');
        Spark::identifyTeamsByPath();
        Spark::usesTeams();
///////////////////////////////////////////////////
/////////////// TEST PLANS ///////////////////////
/////////////////////////////////////////////////
            if (env('testing')) {

                Spark::trialDays(10);
                Spark::freePlan()
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);
                Spark::plan('Basic', 'spark-test-1')
                    ->price(10)
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);

                Spark::plan('Basic', 'spark-test-2')
                    ->price(20)
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);

                Spark::plan('Basic', 'spark-test-3')
                    ->price(100)
                    ->yearly()
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);
                Spark::teamPlan('Basic', 'spark-test-4')
                    ->price(100)
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);

                Spark::teamPlan('Basic', 'spark-test-5')
                    ->price(200)
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);

                Spark::teamPlan('Basic', 'spark-test-6')
                    ->price(1000)
                    ->yearly()
                    ->features([
                        'First',
                        'Second',
                        'Third'
                    ]);
            }
        }
/////////////////////////////////////////////////////
/////////// END TEST PLANS /////////////////////////
///////////////////////////////////////////////////

    public function register()
    {
        Spark::referToTeamAs('outfitter');
    }
}

