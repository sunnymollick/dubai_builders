<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'index']);



?>
