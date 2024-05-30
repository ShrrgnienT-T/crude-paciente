<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CountyController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('patients', PatientController::class);
Route::resource('counties', CountyController::class);





