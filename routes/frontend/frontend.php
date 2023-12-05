<?php

use App\Http\Controllers\Backend\Admin\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/projects/completed', [HomeController::class, 'completedProjects'])->name('completed.projects');
Route::get('/projects/running', [HomeController::class, 'runningProjects'])->name('running.projects');
Route::get('/projects/details/{id}', [HomeController::class, 'detailsProjects'])->name('projects.details');

//About Routes
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Blogs Routes
Route::get('/blogs',[HomeController::class,'blogs'])->name('blogs');
Route::get('blog-details/{id}',[HomeController::class,'blogDetails'])->name('blog.details');


Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('team/{id}', [HomeController::class, 'teamShow'])->name('team.show');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/details/{id}', [HomeController::class, 'servicesDetails'])->name('services.details');
// Contact Routes
Route::post('/contact/store', [HomeController::class, 'storeContact'])->name('contact.store');

// career routes
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/careers/details/{id}', [HomeController::class, 'job_application'])->name('careers.details');
Route::post('/storeJobApplication',[HomeController::class,'storeJobApplication']);

//Quotation Request Routes
Route::post('storeQuotationRequest',[HomeController::class,'storeQuotationRequest']);
