<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientsController;


Route::get('/', [PageController::class, 'index'])->name('homepage');

Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');

Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservation/{id}', [ReservationController::class, 'update'])->name('reservation.update');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
Route::get('/reservation/toggle-payment/{id}', [ReservationController::class, 'togglePaymentStatus'])->name('reservation.togglePaymentStatus');


Route::get('/clients', [AdminController::class, 'clients'])->name('admin.clients');
Route::get('/clients/{id}', [ClientsController::class, 'show'])->name('clients.show');
Route::get('/search', [ClientsController::class, 'search'])->name('clients.search');
