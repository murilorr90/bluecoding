<?php

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hosts = factory(User::class, 50)->create(['is_host' => true]);
        foreach($hosts as $host){
            $reservation = factory(Reservation::class)->create(['host_id' => $host]);
            factory(User::class, 5)->create(['reservation_id' => $reservation->id ]);
        }
    }
}
