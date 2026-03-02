<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;

Route::get('/', function() {
  return "Halaman belum dibuat";
});

Route::prefix("admin")->group(function() {
// DASHBOARD
Route::get('/dashboard', function() {
  $barbers = App\Models\Barber::count();
  $services = App\Models\Service::count();
  $appointments = App\Models\Appointment::count();

  return view("admin.dashboard", compact("barbers", "services", "appointments"));
});

// CRUD BARBERS
Route::resource("/barbers", BarberController::class)->except(["show"]);

// CRUD SERVICES
Route::resource("/services", ServiceController::class)->except(["show"]);
});
