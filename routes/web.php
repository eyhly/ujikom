<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DetailReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

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
    return view('homes.home');
});

// Route::middleware(['auth.check','customer'])->group(function () {
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('homes', [DoctorController::class, 'index'])->name('doctors.index');

    Route::prefix('reservations/{reservasi_id}/details')->group(function () {
        Route::get('create', [DetailReservationController::class, 'create'])->name('details.create');
        Route::post('/', [DetailReservationController::class, 'store'])->name('details.store');
        Route::get('{id}/edit', [DetailReservationController::class, 'edit'])->name('details.edit');
        Route::put('{id}', [DetailReservationController::class, 'update'])->name('details.update');
        Route::delete('{id}', [DetailReservationController::class, 'destroy'])->name('details.destroy');
    });
// });
