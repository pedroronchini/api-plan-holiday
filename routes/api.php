<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanHolidayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/showPlanHoliday', [PlanHolidayController::class, 'index'])->middleware('auth:api');
Route::get('/showPlanHoliday/{id}', [PlanHolidayController::class, 'show'])->middleware('auth:api');
Route::post('/storePlanHoliday', [PlanHolidayController::class, 'store'])->middleware('auth:api');
Route::put('/updatePlanHoliday/{id}', [PlanHolidayController::class, 'update'])->middleware('auth:api');
Route::delete('/deletePlanHoliday/{id}', [PlanHolidayController::class, 'destroy'])->middleware('auth:api');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
