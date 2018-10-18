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
     * List Reservations
     *
     * @return mixed
     *
     */
    public function index()
    {
        $reservation = Reservation::with('guests:id,reservation_id,name')->get();

        return $this->sendResponse($reservation->toArray(), 'Reservations retrieved successfully');
    }

    /**
     * Create Reservation
     *
     * @bodyParam host_id int required
     * @bodyParam guests array required
     *
     * @param CreateUserAPIRequest $request
     * @return mixed
     */
    public function store(CreateReservationAPIRequest $request)
    {
        $input = $request->all();

        $user = User::find($input['host_id']);

        if (!$user->is_host)
            return $this->sendError('User is not a host', 400);

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
     * Show Reservation
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $reservation = Reservation::with('guests')->find($id);

        if (empty($reservation))
            return $this->sendError('Reservation not found', 400);

        return $this->sendResponse($reservation->toArray(), 'Reservation retrieved successfully');
    }

    /**
     * Delete Reservation
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (empty($reservation))
            return $this->sendError('Reservation not found', 400);

        $reservation->delete();

        return $this->sendResponse($id, 'Reservation deleted successfully');
    }


    /**
     * Add Guest to Reservation
     *
     * @bodyParam guests array required
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function addGuest($id, AddGuestReservationAPIRequest $request)
    {
        $guests = $request->get('guests');
        $reservation = Reservation::find($id);

        if (empty($reservation))
            return $this->sendError('Reservation not found', 400);

        foreach($guests as $guest){
            $user = User::find($guest);
            $user->reservation_id = $reservation->id;
            $user->save();
        }

        return $this->sendResponse($reservation->toArray(), 'Guests added successfully');
    }
}
