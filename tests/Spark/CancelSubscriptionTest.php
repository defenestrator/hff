<?php

namespace Tests\Spark;

use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group stripe
 */
class CancelSubscriptionTest extends TestCase
{
    use DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_subscription_can_be_cancelled()
    {
        $user = $this->createSubscribedUser('spark-test-1');
        $this->assertTrue($user->subscribed());
        $this->assertFalse($user->subscription()->onGracePeriod());

        $this->actingAs($user)->delete('/settings/subscription', ['Content-Type', 'application/json']);
//        $this->assertStatus(200);
        $this->assertTrue($user->subscription()->onGracePeriod());
    }
}
