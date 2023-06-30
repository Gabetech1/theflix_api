<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\TrackingController;

Route::group(['middleware' => 'api',], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/sendPasswordResetLink', [AuthController::class, 'sendPasswordResetLink']);
    Route::post('/resetPassword', [ChangePasswordController::class, 'proccess']);

    Route::get('/getTrackingData', [TrackingController::class, 'getTrackingData']);
    Route::post('/postTrackingData', [TrackingController::class, 'postTrackingData']);
    Route::post('/getTrackById', [TrackingController::class, 'getTrackById']);
    Route::post('/updateTrackById', [TrackingController::class, 'updateTrackById']);
    Route::post('/getTrackByNum', [TrackingController::class, 'getTrackByNum']);
    Route::post('/deleteTrackById', [TrackingController::class, 'deleteTrackById']);
    Route::post('/sendMail', [TrackingController::class, 'sendMail']);

    Route::get('/test', [AuthController::class, 'test']);
});