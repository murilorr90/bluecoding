<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * @param $result
     * @param $message
     * @return mixed
     */
    public function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => $message,
            'response'    => $result,
        ]);
    }

    /**
     * @param $error
     * @param int $code
     * @return mixed
     */
    public function sendError($error, $code = 404)
    {
        return response()->json([
            'success' => false,
            'code' => $code,
            'message' => $error,
        ], $code);
    }

}
