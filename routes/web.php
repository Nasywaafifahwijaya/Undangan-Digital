<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('undangan');
});
Route::post('/rsvp', [RsvpController::class, 'store']);
