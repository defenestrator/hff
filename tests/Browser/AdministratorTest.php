<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Tests\Browser\Pages\LoginPage;
use App\User;

class AdministratorTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_administrator_user_can_see_admin_dashboard()
    {
        $user = factory(User::class)->create([
            'email' => 'jeremyblc@gmail.com',
            'name'  => 'Little Bobby Tables'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new LoginPage)
                ->waitForText('Login')
                ->type('email', 'jeremyblc@gmail.com')
                ->type('password', 'secret')
                ->press('@login-button')
                ->waitForText('Dashboard')
                ->assertSee('Administration Dashboard');
        });
    }
}
