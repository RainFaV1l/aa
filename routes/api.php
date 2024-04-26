<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(\App\Http\Controllers\ProjectController::class)->prefix('projects')->group(function () {
    Route::get('/', 'index')->name('projects.index');
});

Route::controller(\App\Http\Controllers\ServiceController::class)->prefix('services')->group(function () {
    Route::get('/', 'index')->name('services.index');
});
