<?php

use App\Http\Controllers\LockController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SystemConfigController;
use App\Http\Controllers\FloodPredictionsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

    
    

Route::get('/lock',[LockController::class,'lock'])->name('lockscreen');
Route::get('/home',[HomeController::class,'index']);
Route::get('/admin',[ProfileController::class,'index'])->name('admin.adm-dashboard');
Route::get('/admin/users',[UserController::class,'index'])->name('admin.users.index');

Route::get('/admin/users/create',[UserController::class,'create'])->name('admin.users.create');
Route::get('/admin/users/edit',[UserController::class,'edit'])->name('admin.users.edit');
Route::get('/admin/adm-dashboard',[DashboardController::class,'index'])->name('admin.adm-dashboard');


Route::post('/admin/users/store',[UserController::class,'store'])->name('admin.users.store');
Route::get('/lockscreen',[ProfileController::class,'lockscreen'])->name('lockscreen');
Route::get('/logout',[ProfileController::class,'logout'])->name('logout');
Route::delete('/destroy/{user}',[UserController::class,'destroy'])->name('destroy');

Route::get('/admin/system-config',[SystemConfigController::class,'index'])->name('admin.system-config');
Route::post('/admin/system-config',[SystemConfigController::class,'store'])->name('system-config.store');
Route::get('/admin/system-config',[SystemConfigController::class,'edit'])->name('admin.system-config');
Route::put('/admin/system-config',[SystemConfigController::class,'update']);
Route::get('/admin/profile',[ProfileController::class,'profile'])->name('admin.profile');
Route::patch('/admin',[ProfileController::class,'profile'])->name('admin.profile.update');
Route::get('/flood-predictions', [FloodPredictionsController::class, 'showForm'])->name('flood-predictions');
Route::get('/predict-flood', [FloodPredictionsController::class, 'predictFlood'])->name('predictFlood');
Route::post('/predict-flood', [FloodPredictionsController::class, 'predictFlood'])->name('predictFlood');


