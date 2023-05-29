<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\WorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['controller' => AuthenticationController::class, 'prefix' => '/auth'], function () {
    Route::post('/registration', 'registration')->middleware('guest');
    Route::post('/login', 'login')->middleware('guest');
    Route::post('/restore', 'restore')->middleware('auth:sanctum');
    Route::post('/restore/confirm', 'restrorePassword')->name('restore-confirmed');
});

Route::group(['controller' => WorkController::class, 'middleware' => 'auth:sanctum'], function () {
    Route::get('/departments', 'departments');
    Route::get('/workers', 'workers');
    Route::get('/workers/{worker}', 'worker');
    Route::get('/user', 'user');
    Route::post('/user', 'editUser');
});


