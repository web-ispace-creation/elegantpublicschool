<?php

use App\Http\Admin\Auth\AuthController;
use App\Http\User\Auth\AuthController as userAuthController;
use App\Http\Admin\Index\AdminIndexController;
use App\Http\Admin\AlumniCouncil\AlumniCouncilController;
use App\Http\Admin\Tc\AdminTcController;
use App\Http\User\Alumni\AlumniController;
use App\Http\User\Tc\TcController;
use Illuminate\Support\Facades\Route;


// Route::get('/user-profile', function () {
//     return view('users.userProfile');
// });

// user
Route::prefix('')->group(function(){
    // Authenication
    Route::prefix('auth')->group(function(){
        Route::get('/register', [userAuthController::class, 'viewRegister'])->name('user.register');
        Route::any('/store', [userAuthController::class, 'register'])->name('user.store');
        Route::post('/forgot-password', [userAuthController::class, 'forgotPassword'])->name('user.password.forgot');
        Route::any('/reset-password/{token}', [userAuthController::class, 'passwordReset'])->name('user.password.reset');
        Route::any('/update-password', [userAuthController::class, 'passwordUpdate'])->name('user.password.update');
        Route::any('/login', [userAuthController::class, 'login'])->name('user.login');
        Route::any('/authenticate', [userAuthController::class, 'authenticate'])->name('user.authenticate');
        Route::any('/viewOtp', [userAuthController::class, 'viewOtp'])->name('user.viewOtp');
        Route::any('/verifyOtp', [userAuthController::class, 'verifyOtp'])->name('user.verifyOtp');
        Route::any('/logout', [userAuthController::class, 'logout'])->name('user.logout');
    });
    Route::middleware(['auth','role:member'])->group(function(){
        Route::get('/',[AlumniController::class,'index'])->name('users.index');
        Route::get('/profile/{id}',[AlumniController::class,'profile'])->name('users.profile');
        Route::get('/edit-profile/{id}',[AlumniController::class,'editProfile'])->name('users.profile.edit');
        Route::get('/remove-qualification',[AlumniController::class,'removeQualification'])->name('users.profile.qualification.remove');
        Route::get('/remove-experience',[AlumniController::class,'removeExperience'])->name('users.profile.exp.remove');
        Route::post('/profile-update',[AlumniController::class,'updateProfile'])->name('user.profile.update');
        Route::get('/alumni-council',[AlumniController::class,'showAlumniCouncil'])->name('user.alumnicouncil.show');
    });
    Route::prefix('tc')->group(function(){
        Route::get('', [TcController::class, 'authForm'])->name('user.tc.form');
        Route::post('download', [TcController::class, 'downloadTC'])->name('user.tc.download');
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
        Route::get('/get-alumni-datatable',[AdminIndexController::class,'getDataTable'])->name('admin.get.alumni.datatable');
        Route::get('/get-alumni-member-data',[AdminIndexController::class,'getAlumniDataWithId'])->name('admin.get.alumni.member.data');
        Route::post('/approve-member',[AdminIndexController::class,'approveMember'])->name('admin.approve.alumni.member');
        // alumni council
        Route::get('/alumni-council',[AlumniCouncilController::class,'index'])->name('admin.alumni-council.index');
        Route::get('/select-alumni-member',[AlumniCouncilController::class,'selectMember'])->name('admin.select-alumni-member');
        Route::post('/add-alumni-council',[AlumniCouncilController::class,'addCouncil'])->name('admin.add-alumni-council');
        Route::get('/get-alumni-council-datatable',[AlumniCouncilController::class,'getDataTable'])->name('admin.get.alumni.council.datatable');
        Route::prefix('tc')->group(function(){
            Route::get('',[AdminTcController::class,'index'])->name('admin.studentTc.index');
            Route::post('add',[AdminTcController::class,'addData'])->name('admin.studentTc.add');
            Route::get('get',[AdminTcController::class,'getDataTable'])->name('admin.studentTc.getDataTable');
            Route::get('delete',[AdminTcController::class,'deleteData'])->name('admin.studentTc.delete');
        });
    });
});