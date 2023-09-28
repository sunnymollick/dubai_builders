<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/projects/completed', [HomeController::class, 'completedProjects'])->name('completed.projects');
Route::get('/projects/running', [HomeController::class, 'runningProjects'])->name('running.projects');
Route::get('/projects/details/{id}', [HomeController::class, 'detailsProjects'])->name('projects.details');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('team/{id}', [HomeController::class, 'teamShow'])->name('team.show');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/details/{id}', [HomeController::class, 'servicesDetails'])->name('services.details');
// Contact Routes
Route::post('/contact/store', [HomeController::class, 'storeContact'])->name('contact.store');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/careers/details/{id}', [HomeController::class, 'careers'])->name('careers.details');
