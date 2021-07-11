<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/reset-pass', [AuthenticationController::class, 'resetPassword']);
Route::group(['middleware' => 'auth:api'], static function () {
    Route::get('/userinfo', [UserController::class, 'getInfo']);
    Route::put('/editself', [UserController::class, 'editSelf']);
    Route::put("/edituser", [UserController::class, 'editUser']);
    Route::put("/changepassword", [UserController::class, 'changePassword']);
    Route::put('/change-email', [UserController::class, 'changeEmailSelf']);
    Route::delete('/deleteuser', [UserController::class, 'destroyUser']);
    Route::get('/users-list', [UserController::class, 'listUsers']);
});
