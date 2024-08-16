<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::get('/admin/forgot-password', [AuthController::class, 'forgotPassword'])->name('admin.forgotPassword');


// 'as' burda name içindeki dosya ismini temsil eder örn: admin.dashboard.index olmasını saglıyr
Route::group(['middleware' => ['auth','user.type:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('/dashboard', [DashboardController::class,'index'])
    ->name('dashboard.index');

    //->middleware('user.type:admin'); // user.type middlewaresine admin olarak manuel değişken atadık
    //gerek kalmadı ama yukard tanımlando
});

?>

