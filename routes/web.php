<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController;

Route::get('/', function () {
  return view('layouts.admin');
});

Route::get('/dashboard', function() {
    $barbers = App\Models\Barber::all();
    $service = App\Models\Service::all();
    $appointment = App\Models\Appointment::all();

    return view("admin.dashboard");
});

// CRUD BARBERS
Route::resource("barbers", BarberController::class)->except(["show"]);
