<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarberController;

Route::get('/', function () {
  return view('layouts.admin');
});

// CRUD BARBERS
Route::resource("barbers", BarberController::class)->except(["show"]);
