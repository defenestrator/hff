<?php

namespace Tests\Feature;

use Tests\DuskTestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\LoginPage;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

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
            $browser->visit(new LoginPage)
                ->waitForText('Login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('@login-button')
                ->assertTitleContains('Dashboard');
        });
    }
}
