<?php

namespace Tests\Feature\Api\Profile;

use Carbon\Carbon;
use Tests\Feature\ApiTestCase;
use Vanguard\Http\Resources\UserResource;

class DetailsControllerTest extends ApiTestCase
{
    /** @test */
    public function get_user_profile_unauthenticated()
    {
        $this->getJson('/api/me')->assertStatus(401);
    }

    /** @test */
    public function get_user_profile()
    {
        $user = $this->login();

        $this->getJson('/api/me')
            ->assertOk()
            ->assertJson(['data' => (new UserResource($user))->resolve()]);
    }

    /** @test */
    public function update_user_profile_unauthenticated()
    {
        $this->patchJson('/api/me/details')->assertStatus(401);
    }

    /** @test */
    public function update_user_profile()
    {
        $user = $this->login();

        $data = $this->getData();

        $response = $this->patchJson("/api/me/details", $data);

        $transformed = (new UserResource($user->fresh()))->resolve();

        $response->assertJsonFragment($transformed);

        $this->assertDatabaseHas('users', array_merge($data, ['id' => $user->id]));
    }

    /** @test */
    public function partially_update_user_details()
    {
        $user = $this->login();

        $data = [
            'first_name' => 'John',
            'last_name'  => 'Doe'
        ];

        $response = $this->patchJson("/api/me/details", $data);

        $transformed = (new UserResource($user->fresh()))->resolve();

        $response->assertJsonFragment($transformed);

        $this->assertDatabaseHas('users', array_merge($data, [
            'id' => $user->id,
            'birthday' => $user->birthday->format('Y-m-d'),
            'phone' => $user->phone,
            'address' => $user->address,
            'country_id' => $user->country_id,
        ]));
    }

    /** @test */
    public function update_without_country_id()
    {
        $user = $this->login();

        $data = $this->getData();

        unset($data['country_id']);

        $response = $this->patchJson("/api/me/details", $data);

        $transformed = (new UserResource($user->fresh()))->resolve();

        $response->assertJsonFragment($transformed);

        $this->assertDatabaseHas('users', array_merge($data, ['id' => $user->id]));
    }

    /** @test */
    public function update_with_invalid_date_format()
    {
        $this->login();

        $this->patchJson("/api/me/details", ['birthday' => 'foo'])
            ->assertStatus(422)
            ->assertJsonFragment([
                'birthday' => [
                    trans('validation.date', ['attribute' => 'birthday'])
                ]
            ]);
    }

    /**
     * @param array $attrs
     * @return array
     */
    private function getData(array $attrs = [])
    {
        return array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => Carbon::now()->subYears(25)->format('Y-m-d'),
            'phone' => '(123) 456 789',
            'address' => 'some address 1',
            'country_id' => 688,
        ], $attrs);
    }
}
