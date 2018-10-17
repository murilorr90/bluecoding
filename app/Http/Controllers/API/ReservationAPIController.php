<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class ReservationAPIController extends Controller
{

    public function index()
    {
        $users = User::all();

            $ownerLatitude = '42.990967';
            $ownerLongitude = '-71.463767';
            $careType = 1;
            $distance = 3;
            $km = 6371;
            $miles = 3958.75586576104;

            $raw = DB::raw('( 6371 * 
                acos( 
                    cos( radians(' . $ownerLatitude . ') ) * 
                    cos( radians( latitude ) ) * 
                    cos( radians( longitude ) - radians(' . $ownerLongitude . ') ) + 
                    sin( radians(' . $ownerLatitude . ') ) *
                    sin( radians( latitude ) ) 
                ) 
            )  as distance');
            $cares = DB::table('users')->select('id', $raw)
                ->orderBy('distance', 'ASC');
                // ->get();
                dd($cares->toSql(), $cares->get()->pluck('distance', 'id'));
        //->having('distance', '<=', $distance)

        dd($users, $cares);
        $reservations = Reservation::all;

        return sendResponse($reservations, 'List All');
    }

    public function create(CreateReservationRequest $request)
    {
        $input = $request->all();
        $reservation = Reservation::create($input);

        return sendResponse($reservation, 'Reservation created successfully.');
    }


    public function update($id, UpdateReservationRequest $request)
    {
        $input = $request->all();
        $reservation = Reservation::create($id);

        if(!$reservation){
            return sendError('Reservation not found');
        }

        $reservation->update($input);
        return sendResponse($reservation, 'Reservation created successfully.');
    }


    public function destroy($id)
    {
        $reservation = Reservation::create($id);

        if(!$reservation){
            return sendError('Reservation not found');
        }

        $reservation->delete();
        return sendResponse($reservation, 'Reservation created successfully.');
    }
}
