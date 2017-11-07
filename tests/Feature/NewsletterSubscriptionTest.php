<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsletterSubscriptionTest extends TestCase
{

    /**
     * Test Newsletter Subscription with Valid Email
     *
     * @return void
     */
    public function test_valid_email()
    {
        $response = $this->withoutMiddleware()->post('/api/newsletter-subscriptions', ['email' => 'test@example.com']);

        $response->assertExactJson();
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
