<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['controller' => AuthenticationController::class, 'prefix' => '/auth'], function () {
    Route::post('/registration', 'registration');
    Route::post('/login', 'login');
    Route::post('/restore', 'restore');
    Route::post('/restore/confirm', 'restrorePassword')->name('restore-confirmed');
});

