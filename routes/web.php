<?php

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

<<<<<<< HEAD
Route::get('/', function () {
    return view('contact');
});
=======
//frontend routes
Route::group([
    'namespace' => 'Frontend',
    'as' => 'frontend.'],
    function () {
        require base_path('routes/frontend/frontend.php');
    });

>>>>>>> 8e0e995d97c2071fcbc12d965452a9750bd4c973
