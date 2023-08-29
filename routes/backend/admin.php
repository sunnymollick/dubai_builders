<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
// Route::get('/projects/add', [DashboardController::class, 'profile'])->name('profile');
// Route::get('/projects/list', [DashboardController::class, 'profile'])->name('profile');
Route::get('/logout',[LoginController::class,'logout']);