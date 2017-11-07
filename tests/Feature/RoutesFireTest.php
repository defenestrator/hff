<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesFireTest extends TestCase
{

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
}