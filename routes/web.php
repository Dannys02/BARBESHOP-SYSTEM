<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController;

Route::get('/', function () {
  return view('layouts.app');
});

// CRUD BARBERS
Route::resource("barbers", BarberController::class)->except(["show"]);