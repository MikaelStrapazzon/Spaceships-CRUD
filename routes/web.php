<?php

use App\Http\Controllers\Pages\SpaceshipController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Pages\DashboardController;

Route::fallback(function () {
    return redirect(Route('login'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('spaceships', SpaceshipController::class);
});
