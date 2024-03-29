<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * @param $language : Language code
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *   path="/change-language/{language}",
     *   description="Change language",
     *   summary="Change language",
     *   operationId="changeLanguage",
     *   tags={"Language"},
     *   @OA\Parameter(
     *     name="language",
     *     in="path",
     *     description="Language",
     *     required=true,
     *     @OA\Schema(
     *         type="string",
     *         enum={"en", "vi"},
     *         default="en"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Change language successfully",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="signal", type="number", example=1),
     *       @OA\Property(property="status", type="string", example="success"),
     *       @OA\Property(property="code", type="number", example=200),
     *       @OA\Property(property="data", type="object",
     *         @OA\Property(property="language", type="string", example="en"),
     *       )
     *    )
     *   ),
     *   @OA\Response(
     *     response="400",
     *     description="Invalid input",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="signal", type="number", example=0),
     *       @OA\Property(property="status", type="string", example="error"),
     *       @OA\Property(property="code", type="number", example=400),
     *       @OA\Property(property="message", type="string", example="Invalid input"),
     *     )
     *   )
     * )
     */
    public function changeLanguage($language)
    {
        if (!in_array($language, ['en', 'vi'])) {
            return $this->errorResponse('Invalid language', 400);
        }

        App::setLocale($language);
        Session::put('locale', $language);

        $data = [
            'language' => $language,
        ];

        return $this->successResponse($data, __('auth.password'));
    }
}
