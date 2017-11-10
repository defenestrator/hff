<?php
namespace Tests\Spark;

use Tests\TestCase;
use App\User;
use App\Team;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @group stripe
 */
class ResumeTeamSubscriptionTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;

    /**
     * @group shit
     */
    public function test_team_subscription_can_be_resumed()
    {
        $user = factory(User::class)->create();
        $team = $this->createTeam($user);
        $team->newSubscription('default', 'spark-test-1')->create($this->getStripeToken());
        $team->subscription()->cancel();

        $this->assertTrue($team->subscription()->onGracePeriod());

        $this->actingAs($user)
                ->json('PUT', '/settings/outfitters/'.$team->id.'/subscription', [
                    'plan' => 'spark-test-1',
                ])->assertStatus(200);

        $team = $team->fresh();
        $this->assertTrue($team->subscribed());
        $this->assertFalse($team->subscription()->onGracePeriod());
    }
}
