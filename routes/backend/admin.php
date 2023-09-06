<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProjectController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Admin\ClientController;
use App\Http\Controllers\Backend\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

//Project Routes
Route::resource('projects', ProjectController::class);
Route::get('allProjects', [ProjectController::class, 'getAllProjects']);

Route::resource('clients', ClientController::class);
Route::get('allClients', [ClientController::class, 'getAllClients']);

Route::resource('services', ServiceController::class);
Route::get('allServices', [ServiceController::class, 'getAllServices']);


Route::get('/logout', [LoginController::class, 'logout']);
