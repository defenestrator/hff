<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->withSession(['foo' => 'bar'])->get('/');

        $response->assertStatus(200);
    }
}