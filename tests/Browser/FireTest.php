<?php

namespace Tests\Feature;

use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\LoginPage;

class FireTest extends DuskTestCase
{
    use DatabaseMigrations;
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
