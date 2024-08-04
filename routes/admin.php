<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::get('/admin/dashboard', [DashboardController::class,'index'])
->name('admin.dashboard.index')
->middleware('user.type:admin'); // user.type middlewaresine admin olarak manuel değişken atadık



?>
