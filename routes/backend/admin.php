<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProjectController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Admin\ClientController;
use App\Http\Controllers\Backend\Admin\TeamController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

//Project Routes
Route::resource('projects', ProjectController::class);
Route::get('allProjects',[ProjectController::class, 'getAllProjects']);

Route::resource('clients', ClientController::class);
Route::get('allClients',[ClientController::class,'getAllClients']);

Route::resource('team', TeamController::class);
Route::get('wholeTeam',[TeamController::class,'getWholeTeam']);

Route::get('/logout',[LoginController::class,'logout']);
