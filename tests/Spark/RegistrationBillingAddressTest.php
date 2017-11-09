<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Spark\Spark;
/**
 * @group stripe
 */
class RegistrationBillingAddressTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_user_can_register()
    {
        Spark::collectBillingAddress();

        $this->json('POST', '/register', [
            'plan' => 'spark-test-1',
            'stripe_token' => $this->getStripeToken(),
            'team' => 'Laravel',
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'address' => 'Test',
            'city' => 'Test',
            'state' => 'AR',
            'zip' => '71901',
            'country' => 'US',
            'terms' => true,
        ])->assertStatus(200);

        Spark::collectBillingAddress(false);
    }
}
