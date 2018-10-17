<?php

namespace App\Http\Controllers\API;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
     * @param CreateUserAPIRequest $request
     * @return mixed
     */
    public function store(CreateReservationRequest $request)
    {
        $input = $request->all();
        $reservation = Reservation::create($input);

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
     * @param $id
     * @param UpdateUserAPIRequest $request
     * @return mixed
     */
    public function update($id, UpdateReservationRequest $request)
    {
        $input = $request->all();
        $reservation = Reservation::find($id);

        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }

        $reservation->update($input);

        return $this->sendResponse($reservation->toArray(), 'Reservation updated successfully');
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
