<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api','cors')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware'=>['cors']],function () {
    Route::post('auth/login', 'Api\AuthController@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/getUserInfo', 'Api\UserController@getUserInfo');
        Route::prefix('/profile')->group(function () {
            Route::get('/getProfile', 'Api\ProfileController@getProfile');
            Route::post('/postUpdateProfile', 'Api\ProfileController@postUpdateProfile');
            Route::post('/postChangeAvatar', 'Api\ProfileController@postChangeAvatar');
        });

    });
});
