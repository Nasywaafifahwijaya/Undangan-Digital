<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

// Tamu TANPA wedding gift (default)
Route::get('/001', [RsvpController::class, 'index']);

// Tamu DENGAN wedding gift
Route::get('/002', [RsvpController::class, 'indexVip']);

Route::post('/rsvp', [RsvpController::class, 'store'])
    ->middleware('throttle:5,1');

Route::get('/admin-rsvp', [RsvpController::class, 'admin']);

Route::delete('/admin-rsvp/delete/{id}', [RsvpController::class, 'destroy']);
