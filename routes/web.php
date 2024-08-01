<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//feed

//profile

Route::get('/', [DashboardController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);
