<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * Build a success response.
     * @param $data
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($data, $message = null, $code = 200)
	{
        return response()->json([
            'signal' => 0,
            'status'=> 'SUCCESS',
            'message' => $message,
            'data' => $data,
        ], $code);
	}

    /**
     * Build a error response.
     * @param $message
     * @param $code
     * @param null $data
     * @return JsonResponse
     */
	protected function errorResponse($message, $code, $data = null)
    {
        return response()->json([
            'signal' => 1,
            'status'=> 'ERROR',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
