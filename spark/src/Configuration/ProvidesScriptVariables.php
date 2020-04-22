<?php

namespace Laravel\Spark\Configuration;

use Laravel\Spark\Spark;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Auth;
use Laravel\Spark\Contracts\InitialFrontendState;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Braintree\ClientToken as BraintreeClientToken;

trait ProvidesScriptVariables
{
    /**
     * Get the default JavaScript variables for Spark.
     *
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'braintreeMerchantId' => config('services.braintree.merchant_id'),
            'braintreeToken' => Spark::billsUsingBraintree() ? BraintreeClientToken::generate() : null,
            'cardUpFront' => Spark::needsCardUpFront(),
            'collectsBillingAddress' => Spark::collectsBillingAddress(),
            'collectsEuropeanVat' => Spark::collectsEuropeanVat(),
            'createsAdditionalTeams' => Spark::createsAdditionalTeams(),
            'csrfToken' => csrf_token(),
            'currencySymbol' => env('CASHIER_CURRENCY', 'usd'),
            'env' => config('app.env'),
            'roles' => Spark::roles(),
            'state' => Spark::call(InitialFrontendState::class.'@forUser', [Auth::user()]),
            'stripeKey' => config('services.stripe.key'),
            'teamString' => Spark::teamString(),
            'pluralTeamString' => Str::plural(Spark::teamString()),
            'userId' => Auth::id(),
            'usesApi' => Spark::usesApi(),
            'usesBraintree' => Spark::billsUsingBraintree(),
            'usesTeams' => Spark::usesTeams(),
            'usesStripe' => Spark::billsUsingStripe(),
        ];
    }
}
