<?php

use App\Module\Airport\Controllers\AirportController;
use Illuminate\Support\Facades\Route;

Route::get('/airports', [AirportController::class, 'index'])->name('airports.index');
