<?php

use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LanguageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});;

// Authentication API with Passport
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'create']);

    Route::group(['middleware' => 'auth:api'], function() {
        Route::delete('logout', [AuthUserController::class, 'logout']);
        Route::get('user', [AuthUserController::class, 'index']);
    });
});

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}',  [LanguageController::class, 'changeLanguage'])->name('change-language');
});

