<?php

use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');
Route::redirect('/', 'dashboard');

Route::get('dashboard', [DashBoardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
