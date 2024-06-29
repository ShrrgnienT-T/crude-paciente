<?php

use App\Http\Controllers\CountyController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('patients/pdf/{patient}', [PatientController::class, 'pdf'])->name('patients.pdf');
Route::get('patients/export/', [PatientController::class, 'export'])->name('patients.export');
Route::resource('patients', PatientController::class);
Route::resource('counties', CountyController::class);
