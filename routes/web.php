<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController;

Route::get('/', function () {
  return view('layouts.admin');
});

Route::get('/dashboard', function() {
  $barbers = App\Models\Barber::count();
  $services = App\Models\Service::count();
  $appointments = App\Models\Appointment::count();

  return view("admin.dashboard", compact("barbers", "services", "appointments"));
});

// CRUD BARBERS
Route::resource("barbers", BarberController::class)->except(["show"]);