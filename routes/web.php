<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TourController::class, 'index'])->name('tours.index');
Route::get('/dashboard', function () { return redirect('/'); })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/bookings', [TourController::class, 'bookings'])->name('tours.bookings');
    Route::get('/tours/{tour}/create', [TourController::class, 'create'])->name('tours.create');
    Route::post('/tours/{tour}', [TourController::class, 'store'])->name('tours.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';
