<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Tests\UpdatesSettings;
use Vanguard\User;

class ApiTestCase extends TestCase
{
    use RefreshDatabase, UpdatesSettings;

    const API_GUARD = 'sanctum';

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->setSettings(['auth.expose_api' => true]);
    }

    /**
     * @return mixed
     */
    protected function login()
    {
        $user = factory(User::class)->create();

        $this->be($user, self::API_GUARD);

        return $user;
    }

    /**
     * @return mixed
     */
    protected function loginSuperUser()
    {
        $user = $this->createSuperUser();

        $this->be($user, self::API_GUARD);

        return $user;
    }

    /**
     * Transform provided collection of items.
     * @param Collection $collection
     * @param $transformer
     * @return array
     */
    protected function transformCollection(Collection $collection, $transformer)
    {
        $transformed = [];

        foreach ($collection as $item) {
            $transformed[] = $transformer->transform($item);
        }

        return $transformed;
    }
}
