<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\MessageController;

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
});

Route::group([], function () {
    Route::get('/users/me', [UserController::class, 'me'])->name('users.me');
    Route::get('/users/{auth_id}', [UserController::class, 'get_users'])->name('users.users');
    Route::get('users/active/{userId}', [UserController::class, 'user_active'])->name('users.user_active');

    Route::get('/messages/{auth_id}/{user_id}', [MessageController::class, 'index'])->name('users.index');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('users.store');

});
