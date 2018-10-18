<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * @group Users
 */
class UserAPIController extends BaseController
{
    /**
     * List Users
     *
     * @return mixed
     */
    public function index()
    {
        $users = User::all();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    /**
     * Create User
     *
     * @bodyParam email email required
     * @bodyParam name string required
     * @bodyParam first_name string required
     * @bodyParam last_name string required
     * @bodyParam is_host bool
     * @bodyParam date_of_birth date required
     *
     * @param CreateUserAPIRequest $request
     * @return mixed
     */
    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();
        $user = User::create($input);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Show User
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = User::find($id);

        if (empty($user))
            return $this->sendError('User not found', 400);

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * Update User
     *
     * @bodyParam email email
     * @bodyParam name string
     * @bodyParam first_name string
     * @bodyParam last_name string
     * @bodyParam is_host bool
     * @bodyParam date_of_birth date
     *
     * @queryParam $id
     * @param UpdateUserAPIRequest $request
     * @return mixed
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        $input = $request->all();
        $user = User::find($id);

        if (empty($user))
            return $this->sendError('User not found', 400);

        $user->update($input);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Delete User
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user))
            return $this->sendError('User not found', 400);

        $user->delete();

        return $this->sendResponse($id, 'User deleted successfully');
    }

    /**
     * Show All Guests
     *
     * @param $id
     * @return mixed
     */
    public function showGuests($id)
    {
        $user = User::find($id);

        if (empty($user))
            return $this->sendError('User not found', 400);

        $guests = [];
        foreach($user->reservations as $r){
            $guests += $r->guests->pluck('name', 'id')->toArray();
        }

        return $this->sendResponse($guests, 'Guests retrieved successfully');
    }

    /**
     * Show All Recommendations
     *
     * @param $id
     * @return mixed
     */
    public function recommendations($id)
    {
        $user = User::find($id);

        if (empty($user))
            return $this->sendError('User not found', 400);

        $commends = User::getRecommendations($user);

        return $this->sendResponse($commends, 'Recommendations retrieved successfully');
    }
}
