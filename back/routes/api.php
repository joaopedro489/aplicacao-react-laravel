<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegionController;
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

Route::post('user', [UserController::class, 'store']);

Route::post('login', [AuthController::class, 'login']);

Route::get('states', [RegionController::class, 'getStates']);
Route::get('states/{country_id}', [RegionController::class, 'getStatesByCountry']);
Route::get('country', [RegionController::class, 'getCountries']);
Route::get('country/{state_id}', [RegionController::class, 'getCountriesByState']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', [AuthController::class, 'me']);
    Route::put('user', [UserController::class, 'update']);
    Route::delete('user', [UserController::class, 'delete']);

    Route::get('logout', [AuthController::class, 'logout']);
});