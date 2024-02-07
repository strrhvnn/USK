<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Models\flight;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:admin')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('admin.edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('admin.update/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::get('admin.airline', [AirlineController::class, 'index'])->name('admin.airline');

    Route::get('admin.airline.create', [AirlineController::class, 'create'])->name('admin.airline.create');
    Route::get('admin.airline.edit/{id}', [AirlineController::class, 'edit'])->name('admin.airline.edit');

    Route::post('admin.airline.store', [AirlineController::class, 'store'])->name('admin.airline.store');
    Route::post('admin.airline.update/{id}', [AirlineController::class, 'update'])->name('admin.airline.update');

    Route::delete('admin.airline.delete/{id}', [AirlineController::class, 'destroy'])->name('admin.airline.delete');

});

Route::middleware('role:maskapai')->group(function () {
    Route::get('maskapai', [MaskapaiController::class, 'index'])->name('maskapai.dashboard');
    Route::get('maskapai.add', [MaskapaiController::class, 'create'])->name('maskapai.flight.add');
    Route::post('maskapai.flight.store', [FlightController::class, 'store'])->name('maskapai.flight.store');


    Route::get('maskapai.flight.edit/{id}', [FlightController::class, 'edit'])->name('maskapai.flight.edit');
    Route::post('maskapai.flight.update/{id}', [FlightController::class, 'update'])->name('maskapai.flight.update');
    Route::delete('maskapai.flight.delete/{id}', [FlightController::class, 'delete'])->name('maskapai.flight.delete');

    Route::get('maskapai.flight.show', [MaskapaiController::class, 'index'])->name('maskapai.flight.show');

    Route::get('maskapai.laporan.pending', [AdminController::class, 'laporan'])->name('maskapai.laporan.pending');
    Route::get('maskapai.laporan.berhasil', [AdminController::class, 'laporanBerhasil'])->name('maskapai.laporan.berhasil');
    Route::post('maskapai.confirmPayment/{id}', [AdminController::class, 'confirmPayment'])->name('maskapai.confirmPayment');

    Route::get('user.searchLaporan', [MaskapaiController::class, 'searchLaporan'])->name('maskapai.searchLaporan');

});

Route::middleware('role:user')->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('user.customer/{id}', [UserController::class, 'create'])->name('user.customer');
    Route::post('user.customer/{id}', [UserController::class, 'store'])->name('user.customer.store');

    Route::get('user.transaction', [TransactionController::class, 'index'])->name('user.transaction');
    Route::post('user.transaction.store', [TransactionController::class, 'store'])->name('user.transaction.store');

    Route::get('user.show', [UserController::class, 'show'])->name('user.show');
    Route::get('user.searchFlights', [FlightController::class, 'searchFlights'])->name('user.searchFlights');
});

require __DIR__ . '/auth.php';
