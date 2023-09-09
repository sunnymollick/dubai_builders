<?php

use App\Http\Controllers\Backend\Admin\AboutController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProjectController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Admin\ClientController;
use App\Http\Controllers\Backend\Admin\ServiceController;
use App\Http\Controllers\Backend\Admin\TeamController;
use App\Http\Controllers\Backend\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

//Project Routes
Route::resource('projects', ProjectController::class);
Route::get('allProjects', [ProjectController::class, 'getAllProjects']);


//Client Routes
Route::resource('clients', ClientController::class);
Route::get('allClients', [ClientController::class, 'getAllClients']);


Route::resource('services', ServiceController::class);
Route::get('allServices', [ServiceController::class, 'getAllServices']);

Route::resource('team', TeamController::class);
Route::get('wholeTeam',[TeamController::class,'getWholeTeam']);
//Settings Route
Route::resource('settings', SettingController::class);
Route::get('getSettings', [SettingController::class, 'getSettings']);

//About Us Routes
Route::resource('abouts', AboutController::class);
Route::get('getAboutInfo', [AboutController::class, 'getAboutInfo']);

//Auth Route
Route::get('/logout', [LoginController::class, 'logout']);
