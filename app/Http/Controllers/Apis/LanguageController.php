<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * @param $language
     * @return \Illuminate\Http\JsonResponse
     *
     * @QA\Info(
     *     title="Change language",
     *     description="Change language",
     *     version="1.0.0"
     * )
     * @OA\PathItem(
     *     path="/api/lang/change/{language}",
     * )
     * @QA\Get(
     *     path="/api/lang/change/{language}",
     *     description="Change language",
     *     summary="Change language",
     *     operationId="changeLanguage",
     *     produces={"application/json"},
     *     tags={"Language"},
     *     @QA\Response(
     *         response=200,
     *         description="Change language successfully",
     *         @QA\Schema(
     *             type="object",
     *             @QA\Property(property="signal", type="number"),
     *             @QA\Property(property="status", type="string"),
     *             @QA\Property(property="code", type="number"),
     *             @QA\Property(property="data", type="array",
     *                  @QA\Items(type="object",
     *                       @QA\Property(property="language", type="string", example="en")
     *                  )
     *             ),
     *         )
     *     )
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
