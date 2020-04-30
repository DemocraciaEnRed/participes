<?php

namespace Tests\Feature\Api\Profile;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Tests\Feature\ApiTestCase;
use Vanguard\Http\Resources\SessionResource;
use Vanguard\Repositories\Session\SessionRepository;
use Vanguard\User;

class SessionsControllerTest extends ApiTestCase
{
    /** @test */
    public function get_user_sessions_unauthenticated()
    {
        $this->getJson('/api/me/sessions')->assertStatus(401);
    }

    /** @test */
    public function get_sessions_if_non_database_driver_is_used()
    {
        config(['session.driver' => 'array']);

        $this->login();

        $this->getJson('/api/me/sessions')->assertStatus(404);
    }

    /** @test */
    public function get_user_sessions()
    {
        config(['session.driver' => 'database']);

        $user = $this->login();

        $sessions = $this->generateNonExpiredSessions($user);

        $this->getJson('/api/me/sessions')
            ->assertOk()
            ->assertJsonFragment([
                'data' => SessionResource::collection($sessions)->resolve()
            ]);
    }

    private function generateNonExpiredSessions(User $user, $count = 5)
    {
        $sessions = [];
        $faker = $this->app->make(\Faker\Generator::class);

        for ($i = 0; $i < $count; $i++) {
            array_push($sessions, [
                'id' => Str::random(40),
                'user_id' => $user->id,
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'payload' => Str::random(),
                'last_activity' => Carbon::now()->subMinute()->timestamp
            ]);
        }

        \DB::table('sessions')->insert($sessions);

        return app(SessionRepository::class)->getUserSessions($user->id);
    }
}
