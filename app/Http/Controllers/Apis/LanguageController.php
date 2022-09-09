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
