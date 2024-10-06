<?php

use App\Http\Controllers\Api\ApartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware('api')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('test', [AuthController::class, 'test']);

    Route::get('/apartments', [ApartmentController::class, 'index']);
    Route::get('/apartments/{apartment_id}', [ApartmentController::class, 'show']);
    Route::get('/availabilities', [ApartmentController::class, 'availabilities']);
});
Route::middleware(['api','auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class,'getAuthenticatedUser']);
    Route::post('/apartments', [ApartmentController::class, 'store']);
    Route::put('/apartments/{apartment_id}', [ApartmentController::class, 'update']);
    Route::delete('/apartments/{apartment_id}', [ApartmentController::class, 'destroy']);

});
