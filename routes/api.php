<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanHolidayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/showPlanHoliday', [PlanHolidayController::class, 'index']);
Route::get('/showPlanHoliday/{id}', [PlanHolidayController::class, 'show']);
Route::post('/storePlanHoliday', [PlanHolidayController::class, 'store']);
Route::put('/updatePlanHoliday/{id}', [PlanHolidayController::class, 'update']);
Route::delete('/deletePlanHoliday/{id}', [PlanHolidayController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
