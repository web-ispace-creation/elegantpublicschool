<?php

use App\Http\Admin\Auth\AuthController;
use App\Http\User\Auth\AuthController as userAuthController;
use App\Http\Admin\Index\AdminIndexController;
use App\Http\Alumni\AlumniController;
use Illuminate\Support\Facades\Route;


// user
Route::prefix('')->group(function(){
    // Authenication
    Route::prefix('auth')->group(function(){
        Route::get('/register', [userAuthController::class, 'viewRegister'])->name('user.register');;
        Route::any('/store', [userAuthController::class, 'register'])->name('user.store');
        Route::get('/verify/bycreator/{user_id}', [userAuthController::class, 'verifyByCreator'])->name('user.verify.bycreator');
        Route::any('/reset-password/{token}', [userAuthController::class, 'passwordReset'])->name('user.password.reset');
        Route::any('/update-password', [userAuthController::class, 'passwordUpdate'])->name('user.password.update');
        Route::any('/login', [userAuthController::class, 'login'])->name('user.login');
        Route::any('/authenticate', [userAuthController::class, 'authenticate'])->name('user.authenticate');
        Route::any('/viewOtp', [userAuthController::class, 'viewOtp'])->name('user.viewOtp');
        Route::any('/verifyOtp', [userAuthController::class, 'verifyOtp'])->name('user.verifyOtp');
        Route::any('/logout', [userAuthController::class, 'logout'])->name('user.logout');
    });
    Route::middleware(['auth'])->group(function(){
        Route::get('/',[AlumniController::class,'index']);
    });
});

// Admin
Route::prefix('admin')->group(function(){
    // Authenication
    Route::prefix('auth')->group(function(){
        Route::get('/show-register', [AuthController::class, 'viewRegister']);
        Route::any('/register', [AuthController::class, 'register'])->name('admin.register');
        Route::get('/verify/bycreator/{admin_id}', [AuthController::class, 'verifyByCreator'])->name('admin.verify.bycreator');
        Route::any('/reset-password/{token}', [AuthController::class, 'passwordReset'])->name('password.reset');
        Route::any('/update-password', [AuthController::class, 'passwordUpdate'])->name('password.update');
        Route::any('/login', [AuthController::class, 'login'])->name('admin.login');
        Route::any('/authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
        Route::any('/viewOtp', [AuthController::class, 'viewOtp'])->name('admin.viewOtp');
        Route::any('/verifyOtp', [AuthController::class, 'verifyOtp'])->name('admin.verifyOtp');
        Route::any('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
    Route::middleware(['auth:admin','role:admin'])->group(function(){
        Route::get('/',[AdminIndexController::class,'index'])->name('admin.index');
    });
});