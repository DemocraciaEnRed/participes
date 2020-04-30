<?php

namespace Tests\Feature\Api;

use Tests\Feature\ApiTestCase;
use Vanguard\Country;
use Vanguard\Http\Resources\CountryResource;

class CountriesControllerTest extends ApiTestCase
{
    /** @test */
    public function unauthenticated()
    {
        $this->getJson('/api/countries')->assertStatus(401);
    }

    /** @test */
    public function get_all_countries()
    {
        $this->login();

        $this->getJson("/api/countries")
            ->assertOk()
            ->assertJson([
                'data' => CountryResource::collection(Country::all())->resolve()
            ]);
    }
}
