<?php

use App\Http\Controllers\Pages\SpaceshipController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::fallback(function () {
    return redirect(Route('login'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('spaceships', SpaceshipController::class);
});
