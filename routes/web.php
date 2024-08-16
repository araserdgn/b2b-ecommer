<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');

// Route::get('/admin/dashboard', [DashboardController::class,'index'])
// ->name('admin.dashboard.index')
// ->middleware('user.type:admin');
//!ADMİN ROUTERLERİNİ AYRI BİR ROUTE DOSYASINDA EKLEDİM


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
