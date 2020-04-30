<?php

namespace Tests\Feature\Api\Authorization;

use Facades\Tests\Setup\RoleFactory;
use Facades\Tests\Setup\UserFactory;
use Tests\Feature\ApiTestCase;
use Vanguard\Http\Resources\RoleResource;
use Vanguard\Role;
use Vanguard\User;

class RolesControllerTest extends ApiTestCase
{
    /** @test */
    public function unauthenticated()
    {
        $this->getJson('/api/roles')
            ->assertStatus(401);
    }

    /** @test */
    public function get_settings_without_permission()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user, self::API_GUARD)
            ->getJson('/api/roles')
            ->assertStatus(403);
    }

    /** @test */
    public function get_roles()
    {
        factory(Role::class)->times(4)->create();

        $response = $this->actingAs($this->getUser(), self::API_GUARD)
            ->getJson("/api/roles")
            ->assertOk();

        $this->assertCount(7, $response->original);
    }

    /** @test */
    public function get_role()
    {
        $userRole = Role::whereName('User')->first();

        $this->actingAs($this->getUser(), self::API_GUARD)
            ->getJson("/api/roles/{$userRole->id}")
            ->assertOk()
            ->assertJson([
                'data' => (new RoleResource($userRole))->resolve()
            ]);
    }

    /** @test */
    public function create_role()
    {
        $this->getUser();

        $data = [
            'name' => 'foo',
            'display_name' => 'Foo Role',
            'description' => 'This is foo role.'
        ];

        $this->actingAs($this->getUser(), self::API_GUARD)
            ->postJson("/api/roles", $data)
            ->assertStatus(201)
            ->assertJsonFragment($data);

        $this->assertDatabaseHas('roles', $data);
    }

    /** @test */
    public function create_role_with_invalid_name()
    {
        $this->be($this->getUser(), self::API_GUARD);

        $this->postJson("/api/roles")
            ->assertStatus(422)
            ->assertJsonValidationErrors('name');

        $this->postJson("/api/roles", ['name' => 'User'])
            ->assertStatus(422)
            ->assertJsonValidationErrors('name');

        $this->postJson("/api/roles", ['name' => 'foo bar'])
            ->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function update_role()
    {
        $user = $this->getUser();

        $data = ['name' => 'foo'];
        $expected = $data + ['id' => $user->role_id];

        $this->actingAs($user, self::API_GUARD)
            ->patchJson("/api/roles/{$user->role_id}", $data)
            ->assertOk()
            ->assertJsonFragment($expected);

        $this->assertDatabaseHas('roles', $expected);
    }

    /** @test */
    public function partially_update_role()
    {
        $user = $this->getUser();

        $data = [
            'name' => 'foo',
            'display_name' => 'Foo Role',
            'description' => 'This is foo role.'
        ];
        $expected = $data + ['id' => $user->role_id];

        $this->actingAs($user, self::API_GUARD)
            ->patchJson("/api/roles/{$user->role_id}", $data)
            ->assertOk()
            ->assertJsonFragment($expected);

        $this->assertDatabaseHas('roles', $expected);
    }

    /** @test */
    public function remove_role()
    {
        $userRole = Role::whereName('User')->first();
        $role = RoleFactory::removable()->withPermissions('roles.manage')->create();
        $user = UserFactory::role($role)->create();

        $this->actingAs($user, self::API_GUARD)
            ->deleteJson("/api/roles/{$role->id}")
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
        $this->assertEquals($userRole->id, $user->fresh()->role_id);
    }

    /** @test */
    public function remove_non_removable_role()
    {
        $role = RoleFactory::withPermissions('roles.manage')->create();

        $this->actingAs($this->getUser(), self::API_GUARD)
            ->deleteJson("/api/roles/{$role->id}")
            ->assertForbidden();
    }

    /**
     * @return mixed
     */
    private function getUser()
    {
        return UserFactory::user()->withPermissions('roles.manage')->create();
    }
}
