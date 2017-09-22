<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_domain_root_response_http_ok()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    function test_domain_root_returns_html()
    {
        $response = $this->get('/');
        $response->assertViewIs('index');
        $response->assertSeeText('info@hoboflyfishing.com');
        $response->assertSee('DIY Destinations');
        $response->assertSee('Hybrid Trips');
        $response->assertSee('Full Service Expeditions');
        $response->assertSee('Independent Guides');
        $response->assertSee('<html');
        $response->assertSee('</html>');
        $response->isValidateable();
    }

    public function test_post_valid_contact_form_results_in_()
    {
        $response = $this->post('/contact', [
            'name' => 'Bob Loblaw',
            'email_address' => 'bob@example.com',
            'message' => 'This is a valid message.',
        ]);
        $response->isSuccessful();
        $response->assertStatus(200);
        $response->assertSeeText('success', 'We will get back to you as quick as we can!');
    }

}
