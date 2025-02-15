<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\PlanPagoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebConfigController;
use App\Models\Availability;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/explorando', function () {
    return view('welcome');
})->name("explorando");
Route::get('/apartments', function () {
    $disponibilidades = Availability::get();
    return view('apartments',compact('disponibilidades'));
})->name("apartments");

Route::middleware(['auth', 'verified'])->group(function () { 
    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::get('/dashboard/apartments', [AdminController::class,'apartments'])->name('dashboard.apartments');
    //apis-apartment
    Route::put('/dashboard/apartments/{apartment_id}', [ApartmentController::class, 'update']);
    Route::post('/dashboard/apartments', [ApartmentController::class, 'store']);
    Route::delete('/dashboard/apartments/{apartment_id}', [ApartmentController::class, 'destroy']);

    Route::get('/dashboard/reservations', [AdminController::class,'reservations'])->name('dashboard.reservations');
    Route::get('/dashboard/reservation-pdf', [AdminController::class,'reservationpdf'])->name('dashboard.reservationpdf');

    Route::get('/dashboard/plan-pago-list', [AdminController::class,'planPagosList'])->name('dashboard.planPagosList');
    Route::get('/dashboard/plan-pago', [AdminController::class,'planPago'])->name('dashboard.planpago');
    Route::post('/dashboard/plan-pago', [PlanPagoController::class,'store'])->name('dashboard.planpago');

    Route::get('/dashboard/api/plan-pago-list', [PlanPagoController::class,'index']);

    Route::get('/dashboard/plan-pago/{planpago}', [AdminController::class,'editPlanpago'])->name('dashboard.planpago.edit');
    Route::put('/dashboard/plan-pago/{planpago}', [PlanPagoController::class,'updatePlanpago']);

    Route::post('/dashboard/plan-pago-preview', [PlanPagoController::class,'planPagoPreview']);
    Route::get('/dashboard/plan-pago-preview', [PlanPagoController::class,'planPagoPreview']);
    Route::delete('/dashboard/plan-pago/{planpago}', [PlanPagoController::class,'deletePlanPago']);

    // WEB CONFIG
    Route::get('/dashboard/webconfig', [WebConfigController::class, 'index'])->name('dashboard.webconfig');
    Route::post('/dashboard/webconfig/upload', [WebConfigController::class, 'upload']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clear', function () {
    // Ejecutar los comandos de Artisan
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "¡Cachés limpiadas correctamente!";
});

require __DIR__.'/auth.php';
