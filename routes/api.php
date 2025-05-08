<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OfficeController;
use App\Http\Controllers\API\EquipmentController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de autenticación
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/users', [AuthController::class, 'users']);

    // Oficinas
    Route::apiResource('offices', OfficeController::class);
    
    // Equipos
    Route::apiResource('equipment', EquipmentController::class);
    
    // Tickets
    Route::apiResource('tickets', TicketController::class);
    Route::put('tickets/{ticket}/assign', [TicketController::class, 'assign']);
    Route::put('tickets/{ticket}/resolve', [TicketController::class, 'resolve']);
});
