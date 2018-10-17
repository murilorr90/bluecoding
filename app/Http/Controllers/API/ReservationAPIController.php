<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\AddGuestReservationAPIRequest;
use App\Http\Requests\API\CreateReservationAPIRequest;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Reservations
 */
class ReservationAPIController extends BaseController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $reservation = Reservation::with('guests:id,reservation_id,name')->get();

        return $this->sendResponse($reservation->toArray(), 'Reservations retrieved successfully');
    }

    /**
     * @bodyParam host_id int required
     * @bodyParam guests array required
     *
     * @param CreateUserAPIRequest $request
     * @return mixed
     */
    public function store(CreateReservationAPIRequest $request)
    {
        $input = $request->all();

        $reservation = DB::transaction(function () use($input) {
            $reservation = Reservation::create($input);

            foreach($input['guests'] as $guest){
                $user = User::find($guest);
                $user->reservation_id = $reservation->id;
                $user->save();
            }
            return $reservation;
        });

        return $this->sendResponse($reservation->toArray(), 'Reservation saved successfully');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $reservation = Reservation::with('guests')->find($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found', 400);
        }

        return $this->sendResponse($reservation->toArray(), 'Reservation retrieved successfully');
    }

    /**
     * @bodyParam guests array required
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function addGuest($id, AddGuestReservationAPIRequest $request)
    {
        $guests = $request->get();
        dd($id,$guests);
        $reservation = Reservation::find($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }

        foreach($guests as $guest){
            $user = User::find($guest);
            $user->reservation_id = $reservation->id;
            $user->save();
        }

        return $this->sendResponse($reservation->toArray(), 'Guests added successfully');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }

        $reservation->delete();

        return $this->sendResponse($id, 'Reservation deleted successfully');
    }
}
