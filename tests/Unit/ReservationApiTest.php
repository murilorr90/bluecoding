<?php

namespace Tests\Unit;

use App\Models\Reservation;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexSuccess()
    {
        $response = $this->json('GET', '/api/v1/reservations');

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
        $host = factory(User::class)->create(['is_host' => true]);
        $guests = factory(User::class, 5)->create();

        $response = $this->json('POST', '/api/v1/reservations', ['host_id' => $host->id, 'guests' => $guests->pluck('id')->toArray()]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreFailure()
    {
        $host = factory(User::class)->create(['is_host' => false]);
        $guests = factory(User::class, 5)->create();

        $response = $this->json('POST', '/api/v1/reservations', ['host_id' => $host->id, 'guests' => $guests->pluck('id')->toArray()]);

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowSuccess()
    {
        $host = factory(User::class)->create(['is_host' => true]);
        $reservation = factory(Reservation::class)->create(['host_id' => $host]);

        $response = $this->json('GET', '/api/v1/reservations/'.$reservation->id);

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
        $response = $this->json('GET', '/api/v1/reservations/9999');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDestroySuccess()
    {
        $host = factory(User::class)->create(['is_host' => true]);
        $reservation = factory(Reservation::class)->create(['host_id' => $host]);

        $response = $this->json('DELETE', '/api/v1/reservations/'.$reservation->id);

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
        $response = $this->json('DELETE', '/api/v1/reservations/9999');

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddGuestSuccess()
    {
        $host = factory(User::class)->create(['is_host' => true]);
        $reservation = factory(Reservation::class)->create(['host_id' => $host]);
        $guests = factory(User::class, 5)->create();

        $response = $this->json('PATCH', '/api/v1/reservations/'.$reservation->id . '/add-guest', ['guests' => $guests->pluck('id')->toArray()]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddGuestFailure()
    {
        $guests = factory(User::class, 5)->create();

        $response = $this->json('PATCH', '/api/v1/reservations/9999/add-guest', ['guests' => $guests->pluck('id')->toArray()]);

        $response->assertStatus(400);
        $response->assertJson(['success' => false]);
    }
}
