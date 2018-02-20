<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SalesInquiryFormTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * Test Newsletter Subscription with Valid Email
     *
     * @return void
     */
    public function test_valid_email()
    {
        $response = $this->withoutMiddleware()->post('/api/sales-inquiry', ['email' => 'test@example.com', 'message' => 'test sales inquiry message']);
        $response->assertJson(['message'  => 'test sales inquiry message']);
        $response->assertStatus(200);
    }

    /**
     * Test Newsletter Subscription with INVALID address
     *
     * @return void
     */
    function test_invalid_email()
    {
        $response = $this->withoutMiddleware()->post('/api/sales-inquiry', ['email' => 'testexamplecom', 'message' => 'test failed sales inquiry message']);
        $response->assertStatus(302);
    }
}
