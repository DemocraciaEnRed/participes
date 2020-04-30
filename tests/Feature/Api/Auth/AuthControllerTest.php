<?php

namespace Tests\Feature\Api\Auth;

use Carbon\Carbon;
use Tests\Feature\ApiTestCase;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;

class AuthControllerTest extends ApiTestCase
{
    /** @test */
    public function login()
    {
        $credentials = $this->defaultCredentials();

        $user = factory(User::class)->create($credentials);

        $credentials['device_name'] = 'test';

        $this->postJson("/api/login", $credentials)->assertOk();

        $this->assertNotNull($user->tokens()->first());
    }

    /** @test */
    public function last_login_timestamp_is_updated_after_login()
    {
        $credentials = $this->defaultCredentials();

        $now = Carbon::now();

        Carbon::setTestNow($now);

        $user = factory(User::class)->create($credentials);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'last_login' => null
        ]);

        $credentials['device_name'] = 'test';

        $this->postJson("/api/login", $credentials)->assertOk();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'last_login' => $now
        ]);
    }

    /** @test */
    public function login_with_invalid_credentials()
    {
        $credentials = $this->defaultCredentials();

        factory(User::class)->create($credentials);

        $this->postJson("/api/login", [
            'username' => 'foo',
            'password' => 'invalid',
            'device_name' => 'test'
        ])->assertJsonValidationErrors('username');
    }

    /** @test */
    public function login_when_credentials_are_not_provided()
    {
        $this->postJson("/api/login")
            ->assertStatus(422)
            ->assertJsonFragment([
                'username' => [
                    trans('validation.required', ['attribute' => 'username'])
                ],
                'password' => [
                    trans('validation.required', ['attribute' => 'password'])
                ]
            ]);
    }

    /** @test */
    public function banned_user_cannot_log_in()
    {
        $credentials = $this->defaultCredentials();

        $user = factory(User::class)->create(array_merge($credentials, [
            'status' => UserStatus::BANNED
        ]));

        $credentials['device_name'] = 'test';

        $this->postJson("/api/login", $credentials)
            ->assertStatus(401)
            ->assertJson([
                'message' => "Your account is banned by administrators."
            ]);

        $this->assertDatabaseMissing('personal_access_tokens', ['tokenable_id' => $user->id]);
    }

    /** @test */
    public function unconfirmed_user_can_log_in()
    {
        $credentials = $this->defaultCredentials();

        factory(User::class)->create(array_merge($credentials, [
            'status' => UserStatus::UNCONFIRMED
        ]));

        $credentials['device_name'] = 'test';

        $this->postJson("/api/login", $credentials)->assertOk();
    }

    /** @test */
    public function logout()
    {
        $credentials = $this->defaultCredentials();

        Carbon::setTestNow(Carbon::now());

        $user = factory(User::class)->create($credentials);

        $credentials['device_name'] = 'test';

        $response = $this->postJson("/api/login", $credentials);

        $token = $user->tokens()->first();

        auth('sanctum')->user()->withAccessToken($token);

        $this->postJson("/api/logout", [], [
            'Authorization' => "Bearer {$response->original['token']}"
        ]);

        $this->assertDatabaseMissing('personal_access_tokens', ['id' => $token->id]);
    }

    /** @test */
    public function logout_if_token_is_not_provided()
    {
        $this->postJson("/api/logout")->assertStatus(401);
    }

    private function defaultCredentials(array $override = [])
    {
        return array_merge([
            'username' => 'foo',
            'password' => 'bar'
        ], $override);
    }
}
