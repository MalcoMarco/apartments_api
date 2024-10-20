<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\ProfileController;
use App\Models\Availability;
use Illuminate\Support\Facades\Route;

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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
