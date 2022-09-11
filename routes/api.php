<?php

use App\Http\Controllers\Apis\LanguageController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'locale'], function () {
    // Authentication API with Passport
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [RegisterController::class, 'create']);

        Route::group(['middleware' => 'auth:api'], function () {
            Route::delete('logout', [AuthUserController::class, 'logout']);
            Route::get('user', [AuthUserController::class, 'user']);
        });
    });

    Route::get('change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('change-language');
});

