<?php

namespace App\Traits;

trait ApiResponser
{
    /**
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
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
	protected function errorResponse($message = null, $code)
	{
        return response()->json([
            'signal' => 0,
            'status'=> 'ERROR',
            'message' => $message,
            'data' => null,
        ], $code);
	}

}
