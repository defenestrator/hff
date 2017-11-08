<?php

namespace Tests\Feature;

use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FireTest extends DuskTestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * Test the Damn Thing works at all
     */
    public function test_domain_root_response_http_ok()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test the Damn Thing spits HTML
     */
    function test_domain_root_returns_html()
    {
        $response = $this->get('/');
        $response->assertViewIs('index');
        $response->assertSeeText('info@hoboflyfishing.com');
        $response->assertSee('Self-Guided Adventures');
        $response->assertSee('Hybrid Trips');
        $response->assertSee('Full Service Expeditions');
        $response->assertSee('<html');
        $response->assertSee('</html>');
        $response->isValidateable();
    }
    /**
     * Test Authentication and User Creation.
     *
     * @return void
     */
    public function test_authentication_of_valid_user()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'name'  => 'Little Bobby Tables'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('@login')
                ->assertTitleContains('Dashboard');
        });
    }
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
