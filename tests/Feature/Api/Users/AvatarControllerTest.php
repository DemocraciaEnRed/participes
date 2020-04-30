<?php

namespace Tests\Feature\Api\Users;

use Facades\Tests\Setup\UserFactory;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\Feature\ApiTestCase;
use Vanguard\Events\User\UpdatedByAdmin;
use Vanguard\User;

class AvatarControllerTest extends ApiTestCase
{
    /** @test */
    public function upload_user_avatar_unauthenticated()
    {
        $user = factory(User::class)->create();

        $this->post("/api/users/{$user->id}/avatar")
            ->assertStatus(401);
    }

    /** @test */
    public function upload_avatar_without_permission()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user, self::API_GUARD)
            ->post("/api/users/{$user->id}/avatar")
            ->assertForbidden();
    }

    /** @test */
    public function upload_avatar_image()
    {
        $this->expectsEvents(UpdatedByAdmin::class);

        Storage::fake('public');

        $user = UserFactory::withPermissions('users.manage')->create();

        $file = UploadedFile::fake()->image('avatar.png', 500, 500);

        $response = $this->actingAs($user, self::API_GUARD)
            ->post("/api/users/{$user->id}/avatar", ['file' => $file])
            ->assertOk();

        $avatar = $response->json('data.avatar');
        $this->assertNotNull($avatar);

        $uploadedFile = str_replace(url(''), '', $avatar);
        $uploadedFile = ltrim($uploadedFile, "/");

        Storage::disk('public')->assertExists($uploadedFile);

        list($width, $height) = getimagesizefromstring(
            Storage::disk('public')->get($uploadedFile)
        );

        $this->assertEquals(160, $width);
        $this->assertEquals(160, $height);
    }

    /** @test */
    public function upload_invalid_image()
    {
        $user = UserFactory::withPermissions('users.manage')->create();

        Storage::fake('public');

        $file = UploadedFile::fake()->create('avatar.txt', 500);

        $this->actingAs($user, self::API_GUARD)
            ->post("/api/users/{$user->id}/avatar", ['file' => $file])
            ->assertStatus(422)
            ->assertJsonFragment([
                'file' => [
                    trans('validation.image', ['attribute' => 'file'])
                ]
            ]);
    }

    /** @test */
    public function update_avatar_from_external_source()
    {
        $this->expectsEvents(UpdatedByAdmin::class);

        $user = UserFactory::withPermissions('users.manage')->create();

        $url = 'http://google.com';

        $this->actingAs($user, self::API_GUARD)
            ->putJson("/api/users/{$user->id}/avatar/external", ['url' => $url])
            ->assertOk()
            ->assertJsonFragment(['avatar' => $url]);
    }

    /** @test */
    public function update_avatar_with_invalid_external_source()
    {
        $user = UserFactory::withPermissions('users.manage')->create();

        $this->actingAs($user, self::API_GUARD)
            ->putJson("/api/users/{$user->id}/avatar/external", ['url' => 'foo'])
            ->assertStatus(422);
    }

    /** @test */
    public function delete_user_avatar()
    {
        $this->expectsEvents(UpdatedByAdmin::class);

        $user = UserFactory::withPermissions('users.manage')->create();

        $user->forceFill(['avatar' => 'http://google.com'])->save();

        $this->actingAs($user, self::API_GUARD)
            ->deleteJson("api/users/{$user->id}/avatar")
            ->assertOk()
            ->assertJsonFragment([
                'avatar' => url('assets/img/profile.png') // default profile image
            ]);
    }
}
