<?php

namespace Tests\Unit;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexSuccess()
    {
        $response = $this->json('GET', '/api/v1/users');

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreSuccess()
    {
        $user = factory(User::class)->make();

        $response = $this->json('POST', '/api/v1/users', $user->toArray());

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowSuccess()
    {
        $user = factory(User::class)->create();
        $response = $this->json('GET', '/api/v1/users/'.$user->id);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowFailure()
    {
        $response = $this->json('GET', '/api/v1/users/999999');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateSuccess()
    {
        $user = factory(User::class)->create();
        $new = factory(User::class)->make();

        $response = $this->json('PATCH', '/api/v1/users/'.$user->id, $new->toArray());

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateFailure()
    {
        $response = $this->json('PATCH', '/api/v1/users/999999');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }
//
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDestroySuccess()
    {
        $user = factory(User::class)->create();

        $response = $this->json('DELETE', '/api/v1/users/'.$user->id);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDestroyFailure()
    {
        $response = $this->json('DELETE', '/api/v1/users/999999');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowGuestsSuccess()
    {
        $host = factory(User::class)->create(['is_host' => true]);
        factory(Reservation::class)->create(['host_id' => $host]);
        factory(User::class, 5)->create();

        $response = $this->json('GET', '/api/v1/users/'.$host->id . '/guests');

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowGuestsFailure()
    {
        $response = $this->json('GET', '/api/v1/users/999999/guests');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRecommendationsSuccess()
    {
        $user = factory(User::class)->create();

        $response = $this->json('GET', '/api/v1/users/'.$user->id . '/recommendations');

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRecommendationsFailure()
    {
        $response = $this->json('GET', '/api/v1/users/999999/recommendations');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }
}

