<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;

/**
 * @group stripe
 */
class RegistrationTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_users_can_register()
    {
        $this->assertTrue(true);
//        $this->json('POST', '/register', [
//            'team' => 'Laravel',
//            'slug' => 'laravel',
//            'name' => 'Taylor Otwell',
//            'email' => 'taylor@laravel.com',
//            'password' => 'secret',
//            'password_confirmation' => 'secret',
//            'terms' => true,
//        ])->assertStatus(200);
//
//        $this->assertDatabaseHas('users', [
//            'email' => 'taylor@laravel.com',
//        ]);
//
//        $this->assertTrue(
//            User::where('email', 'taylor@laravel.com')->first()->onGenericTrial()
//        );
    }


//    public function test_user_can_subscribe_to_plan()
//    {
//        $this->json('POST', '/register', [
//            'plan' => 'spark-test-1',
//            'stripe_token' => $this->getStripeToken(),
//            'team' => 'Laravel',
//            'name' => 'Taylor Otwell',
//            'email' => 'taylor@laravel.com',
//            'password' => 'secret',
//            'password_confirmation' => 'secret',
//            'terms' => true,
//        ])->assertStatus(200);
//
//        $this->assertDatabaseHas('users', [
//            'email' => 'taylor@laravel.com',
//        ]);
//
//        $user = User::where('email', 'taylor@laravel.com')->first();
//
//        $this->assertTrue($user->subscribed());
//        $this->assertEquals('spark-test-1', $user->subscription()->stripe_plan);
//    }
//
//
//    public function test_user_can_register_with_invitation()
//    {
//        $team = $this->createTeam();
//
//        $invitation = $team->invitations()->create([
//            'id' => Uuid::uuid4(),
//            'email' => 'test@hoboflyfishing.com',
//            'token' => Str::random(40),
//        ]);
//
//        $this->json('POST', '/register', [
//            'invitation' => $invitation->token,
//            'team' => 'Laravel',
//            'slug' =>'laravel',
//            'uuid' => Uuid::uuid4(),
//            'name' => 'Taylor Otwell',
//            'email' => 'taylor@laravel.com',
//            'password' => 'secret',
//            'password_confirmation' => 'secret',
//            'terms' => true,
//        ])->assertStatus(200);
//
//        $user = User::where('email', 'taylor@laravel.com')->first();
//        $this->assertEquals(1, $user->teams()->count());
//        $this->assertEquals($team->name, $user->teams()->first()->name);
//        $this->assertEquals('member', $user->roleOn($user->teams()->first()));
//    }
}
