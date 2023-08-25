<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//frontend routes
Route::group([
    'namespace' => 'Frontend',
    'as' => 'frontend.'],
    function () {
        require base_path('routes/frontend/frontend.php');
    });

// Admin Dashborad
Route::group([
    'namespace' => 'Backend\Admin',
    'prefix' => 'admin',
    'as' => 'admin.'],
    function () {
        require base_path('routes/backend/admin.php');
    });

// Admin Auth
Route::prefix('admin_login')->group(function () {
    Route::get('login', [LoginController::class,'index'])->name('admin.auth.login');
});
