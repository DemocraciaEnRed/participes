<?php

namespace Tests\Feature\Api\Auth;

use Carbon\Carbon;
use Laravel\Socialite\Contracts\User as SocialUserContract;
use Laravel\Socialite\Two\FacebookProvider;
use Mockery as m;
use Tests\Feature\ApiTestCase;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;

class SocialLoginControllerTest extends ApiTestCase
{
    /** @test */
    public function social_authentication_for_first_time()
    {
        $this->setSettings(['reg_enabled' => true]);

        $socialUser = new StubSocialUser;

        $this->mockFacebookProvider($socialUser);

        $now = Carbon::now()->addHours(2);
        Carbon::setTestNow($now);

        $this->postJson("/api/login/social", $this->defaultParams())
            ->assertOk();

        $user = User::whereEmail($socialUser->getEmail())->first();

        $this->assertDatabaseHas('users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $socialUser->getEmail(),
            'status' => UserStatus::ACTIVE,
            'avatar' => $socialUser->getAvatar(),
            'last_login' => $now
        ]);

        $this->assertDatabaseHas('social_logins', [
            'user_id' => $user->id,
            'provider' => 'facebook',
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar()
        ]);
    }

    /** @test */
    public function associate_social_account_with_existing_user()
    {
        $this->setSettings(['reg_enabled' => true]);

        $socialUser = new StubSocialUser;

        $this->mockFacebookProvider($socialUser);

        $user = factory(User::class)->create([
            'email' => $socialUser->getEmail()
        ]);

        $this->postJson("/api/login/social", $this->defaultParams())
            ->assertOk();

        $this->assertDatabaseHas('social_logins', [
            'user_id' => $user->id,
            'provider' => 'facebook',
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar()
        ]);
    }

    /** @test */
    public function social_login_if_registration_is_disabled()
    {
        $this->setSettings(['reg_enabled' => false]);

        $socialUser = new StubSocialUser;

        $this->mockFacebookProvider($socialUser);

        $this->postJson("/api/login/social", $this->defaultParams())
            ->assertForbidden()
            ->assertJson([
                'message' => "Only users who already created an account can log in."
            ]);
    }

    /** @test */
    public function social_login_with_invalid_provider()
    {
        $this->postJson("/api/login/social", $this->defaultParams(['network' => 'foo']))
            ->assertStatus(422)
            ->assertJsonValidationErrors('network');
    }

    /** @test */
    public function social_login_for_banned_user()
    {
        $socialUser = new StubSocialUser;

        $this->mockFacebookProvider($socialUser);

        $user = factory(User::class)->create([
            'email' => $socialUser->getEmail(),
            'status' => UserStatus::BANNED
        ]);

        app(UserRepository::class)->associateSocialAccountForUser($user->id, 'facebook', $socialUser);

        $this->postJson("/api/login/social", $this->defaultParams())
            ->assertForbidden()
            ->assertJson([
                'message' => 'Your account is banned by administrators.'
            ]);
    }

    private function defaultParams(array $overrides = [])
    {
        return array_merge([
            'network' => 'facebook',
            'social_token' => 'foo',
            'device_name' => 'test',
        ], $overrides);
    }

    private function mockFacebookProvider($socialUser)
    {
        $provider = m::mock(FacebookProvider::class);
        $provider->shouldReceive('userFromToken')->with('foo')->andReturn($socialUser);

        \Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);
    }
}

class StubSocialUser implements SocialUserContract
{
    public $avatar_original = 'http://www.gravatar.com/avatar';

    public function getId()
    {
        return '123';
    }

    public function getNickname()
    {
        return 'johndoe';
    }

    public function getName()
    {
        return 'John Doe';
    }

    public function getEmail()
    {
        return 'john@doe.com';
    }

    public function getAvatar()
    {
        return 'http://www.gravatar.com/avatar';
    }
}
