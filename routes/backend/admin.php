<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProjectController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Admin\ClientController;
<<<<<<< HEAD
use App\Http\Controllers\Backend\Admin\ServiceController;
=======
use App\Http\Controllers\Backend\Admin\SettingController;
>>>>>>> d49ab092202e082dfe4b0e7165e4133d24e8327d
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

//Project Routes
Route::resource('projects', ProjectController::class);
Route::get('allProjects', [ProjectController::class, 'getAllProjects']);


//Client Routes
Route::resource('clients', ClientController::class);
Route::get('allClients', [ClientController::class, 'getAllClients']);

<<<<<<< HEAD
Route::resource('services', ServiceController::class);
Route::get('allServices', [ServiceController::class, 'getAllServices']);


Route::get('/logout', [LoginController::class, 'logout']);
=======
//Settings Route
Route::resource('settings', SettingController::class);
Route::get('getSettings', [SettingController::class, 'getSettings']);

//Auth Route
Route::get('/logout',[LoginController::class,'logout']);
>>>>>>> d49ab092202e082dfe4b0e7165e4133d24e8327d
