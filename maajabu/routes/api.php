<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EmailVerificationController;

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

    Route::post('logout',[AuthController::class,'logout']);
    Route::apiResource('user', UserController::class);
    Route::apiResource('reservation', ReservationController::class);

});

Route::middleware('auth:sanctum','verified')->get('/user', function (Request $request) {
    return $request->user();
});

//Routes access public
Route::apiResource('artist', ArtistController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('engineer', EngineerController::class);
Route::apiResource('service', ServiceController::class);
Route::apiResource('studio', StudioController::class);
Route::apiResource('tarif', TarifController::class);
Route::apiResource('work', WorkController::class);
Route::apiResource('image', ImageController::class);

//Reset Password

Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');

Route::post('forgot-password', [ResetPasswordController::class, 'forgot_password']);
Route::post('reset-password', [ResetPasswordController::class, 'reset_password']);

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
