<?php

use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\ServiceController;
use App\Http\Controllers\Api\v1\TechnologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:api'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::resource('projects', ProjectController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('technologies', TechnologyController::class);

});


