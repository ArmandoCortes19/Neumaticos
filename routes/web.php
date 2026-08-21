<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NeumaticoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard (redirects by role)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', fn() => view('admin.index'))->middleware('role:admin')->name('admin');
    Route::get('/slw', fn() => view('areas.slw'))->middleware('role:slw,admin')->name('slw');
    Route::get('/qet', fn() => view('areas.qet'))->middleware('role:qet,admin')->name('qet');
    Route::get('/butc', fn() => view('areas.butc'))->middleware('role:butc,admin')->name('butc');

    Route::resource('neumaticos', NeumaticoController::class);
});
