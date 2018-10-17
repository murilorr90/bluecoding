<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Response;

class UserAPIController extends BaseController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $users = User::all();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    /**
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
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('User not found', 400);
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * @param $id
     * @param UpdateUserAPIRequest $request
     * @return mixed
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        $input = $request->all();
        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->update($input);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->delete();

        return $this->sendResponse($id, 'User deleted successfully');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function recommendations($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $commends = User::getRecommendations($user);

        return $this->sendResponse($commends, 'Recommendations retrieved successfully');
    }
}
