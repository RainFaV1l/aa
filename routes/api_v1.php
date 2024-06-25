<?php

use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\ServiceController;
use App\Http\Controllers\Api\v1\TechnologyController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:api'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('technologies', TechnologyController::class);
});
