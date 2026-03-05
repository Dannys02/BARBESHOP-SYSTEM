<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function() {
  $barbers = App\Models\Barber::all();
  $services = App\Models\Service::all();

  return view('welcome', compact('barbers', 'services'));
});

Route::get('/booking/create', [AppointmentController::class, 'create'])->name('booking.create');
Route::post('/booking', [AppointmentController::class, 'store'])->name('booking.store');

Route::middleware(['auth'])->group(function() {
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

    // APPOINTMENTS SYSTEM
    Route::resource("/booking", AppointmentController::class)->except(["show"]);

    // Custom route untuk update status
    Route::put('/booking/{appointment}/update-status', [AppointmentController::class, 'updateStatus'])
    ->name('booking.updateStatus');

  });
});