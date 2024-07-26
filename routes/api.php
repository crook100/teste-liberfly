<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DummyController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login',    'login')->name("login");
    Route::post('logout',   'logout')->name("logout");
    Route::post('refresh',  'refresh')->name("refresh");
});

Route::controller(DummyController::class)->group(function () {
    Route::get('dummies',       'index');
    Route::get('dummies/{id}',  'show');
});
