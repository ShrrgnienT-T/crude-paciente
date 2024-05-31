<?php

use App\Http\Controllers\CountyController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('patients', PatientController::class);
Route::resource('counties', CountyController::class);
