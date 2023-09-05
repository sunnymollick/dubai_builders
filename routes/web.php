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
Route::group(
    [
        'namespace' => 'Frontend',
        'as' => 'frontend.'
    ],
    function () {
        require base_path('routes/frontend/frontend.php');
    }
);

// Admin Dashborad
Route::group(
    [
        'middleware' => 'checkloggedin',
        'namespace' => 'Backend\Admin',
        'prefix' => 'admin',
        'as' => 'admin.'
    ],
    function () {
        require base_path('routes/backend/admin.php');
    }
);

Route::group(['prefix' => 'admin_login'], function () {
    // auth login
    Route::get('login', [LoginController::class, 'index'])->name('admin.auth.login');
    Route::post('login', [LoginController::class, 'loginStore'])->name('admin.auth.login_store');
});
