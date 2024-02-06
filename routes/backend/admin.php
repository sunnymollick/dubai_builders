<?php

use App\Http\Controllers\Backend\Admin\AboutController;
use App\Http\Controllers\Backend\Admin\CareerController;
use App\Http\Controllers\Backend\Admin\BlogController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProjectController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Admin\ClientController;
use App\Http\Controllers\Backend\Admin\ContactController;
use App\Http\Controllers\Backend\Admin\InvoiceController;
use App\Http\Controllers\Backend\Admin\ItemController;
use App\Http\Controllers\Backend\Admin\QuotationRequestController;
use App\Http\Controllers\Backend\Admin\ServiceController;
use App\Http\Controllers\Backend\Admin\TeamController;
use App\Http\Controllers\Backend\Admin\SettingController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\Admin\QuotationController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;

use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\UnitController;
use App\Http\Controllers\Backend\Admin\WorkCategoryController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

//Project Routes
Route::resource('projects', ProjectController::class);
Route::get('allProjects', [ProjectController::class, 'getAllProjects']);


//Client Routes
Route::resource('clients', ClientController::class);
Route::get('allClients', [ClientController::class, 'getAllClients']);


//Blog Routes
Route::resource('blogs', BlogController::class);
Route::get('getAllBlogs', [BlogController::class, 'getAllBlogs']);

//Service Routes
Route::resource('services', ServiceController::class);
Route::get('allServices', [ServiceController::class, 'getAllServices']);

// Team Route
//Team Routes
Route::resource('team', TeamController::class);
Route::get('wholeTeam', [TeamController::class, 'getWholeTeam']);

//Settings Route
Route::resource('settings', SettingController::class);
Route::get('getSettings', [SettingController::class, 'getSettings']);

//About Us Routes
Route::resource('abouts', AboutController::class);
Route::get('getAboutInfo', [AboutController::class, 'getAboutInfo']);


Route::resource('messages', ContactController::class);
Route::get('/fetch-messages', [ContactController::class, 'fetchMessages'])->name('fetch.messages');
Route::get('/fetch-chat/{id}', [ContactController::class, 'fetchChat'])->name('fetch.chat');

//Auth Route
Route::get('/logout', [LoginController::class, 'logout']);

// Carrer route
Route::resource('careers', CareerController::class);
Route::get('allCareers', [CareerController::class, 'getAllCareers']);

//Quotation Request Routes
Route::get('request/for/quotation', [QuotationRequestController::class, 'index'])->name('request.quotation');
Route::get('getAllQuotationRequest', [QuotationRequestController::class, 'getAllQuotationRequest']);
Route::get('request/for/quotation/edit/{id}', [QuotationRequestController::class, 'edit']);
Route::get('request/for/view/quotation/{id}', [QuotationRequestController::class, 'viewQuotationRequest']);
Route::delete('request/for/delete/requested/quotation/{id}', [QuotationRequestController::class, 'deleteQuotationRequest']);


//Work Category Routes
Route::resource('workcategories', WorkCategoryController::class);
Route::get('allWorkCategories', [WorkCategoryController::class, 'getAllWorkCategories']);

//Unit Routes
Route::resource('units', UnitController::class);
Route::get('allUnits', [UnitController::class, 'getUnits']);

//Item/Works Routes
Route::resource('itemworks', ItemController::class);
Route::get('allItemWorks', [ItemController::class, 'getAllItemWorks']);

// Quotation Routes
Route::get('all-quotations', [QuotationController::class, 'index'])->name('all.quotations');
Route::delete('all-quotations/delete/{id}', [QuotationController::class, 'deleteQuotation']);
Route::get('all-quotations/view/{id}', [QuotationController::class, 'viewQuotation']);
Route::get('all-quotations/generate-pdf/{id}', [QuotationController::class, 'generatePDF']);
Route::get('request/for/quotation/preview',[QuotationController::class, 'preview']);
Route::post('request/for/quotation/store', [QuotationController::class, 'store']);
Route::get('request/for/quotation/fetch-items/{id}', [QuotationController::class, 'fetchItems']);

//Slider Route
Route::resource('sliders', SliderController::class);
Route::get('getAllSliders', [SliderController::class, 'getAllSliders']);


// job application route
Route::get('job_application_index', [CareerController::class, 'jobApplicationIndex'])->name('job_applications');
Route::get('allJobApplications', [CareerController::class, 'getallJobApplications']);
Route::post('job_application/reply/{id}', [CareerController::class, 'jobApplicationReply']);


// invoice route
Route::get('generate_invoice/{id}', [InvoiceController::class, 'generateInvoice']);
