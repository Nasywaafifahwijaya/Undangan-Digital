<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', [RsvpController::class, 'index']);

Route::post('/rsvp', [RsvpController::class, 'store'])
    ->middleware('throttle:5,1');

Route::get('/admin-rsvp-alyanas-2026', [RsvpController::class, 'admin']);
