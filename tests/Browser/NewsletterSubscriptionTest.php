<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NewsletterSubscriptionTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * Test Newsletter Subscription with Valid Email
     *
     * @return void
     */
    public function test_valid_email()
    {
        $response = $this->withoutMiddleware()->post('/api/newsletter-subscriptions', ['email' => 'test@example.com']);

        $response->assertJson(["email_address" => "test@example.com"]);
    }

    /**
     * Test Newsletter Subscription with INVALID address
     *
     * @return void
     */
    function test_invalid_email()
    {
        $response = $this->withoutMiddleware()->post('/api/newsletter-subscriptions', ['email' => 'testexamplecom']);
        $response->assertDontSee('Thanks for signing up!')
            ->assertDontSee('We promise not to spam you.');
    }
}