<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\ReservationController;

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


//Routes access private
Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::apiResource('reservation', ReservationController::class);
    Route::post('logout',[AuthController::class,'logout']);
    Route::apiResource('user', UserController::class);

});

//Routes access public
Route::apiResource('artist', ArtistController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('engineer', EngineerController::class);
Route::apiResource('service', ServiceController::class);
Route::apiResource('studio', StudioController::class);
Route::apiResource('tarif', TarifController::class);
Route::apiResource('work', WorkController::class);

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
