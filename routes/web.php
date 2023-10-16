<?php

use App\Http\Controllers\backend\application\ApplicationController;
use App\Http\Controllers\backend\auth\AuthController;
use App\Http\Controllers\backend\form\FormController;
use App\Http\Controllers\backend\student\StudentController;
use App\Http\Controllers\backend\user\UserController;
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




Route::get('/',[AuthController::class,'login'])->name('auth.login');
Route::get('/create',[AuthController::class,'create'])->name('auth.create');
Route::post('/store',[AuthController::class,'store'])->name('auth.store');
Route::post('/login-submit',[AuthController::class,'login_submit'])->name('auth.login-submit');
Route::get('/reset-password',[AuthController::class,'reset_password_page'])->name('auth.reset_password');
Route::post('/reset-password-link',[AuthController::class,'reset_password_link'])->name('auth.reset-password-link');
Route::get('/admin/reset-password/{token}/{email}',[AuthController::class,'reset_password'])->name('auth.reset_password_link');
Route::post('/reset-password-submit',[AuthController::class,'reset_password_submit'])->name('auth.reset_password_submit');


Route::middleware('auth')->group(function (){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard',[AuthController::class,'index'])->name('auth.index')->middleware('isStatus');
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');


        Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
        Route::post('/profile/profile-image-update',[UserController::class,'profile_image_update'])->name('users.profile.image.update');
        Route::post('/profile/profile-information-update',[UserController::class,'profile_information_update'])->name('users.profile.information.update');
        Route::post('/profile/profile-password-update',[UserController::class,'profile_password_update'])->name('users.profile.password.update');

        Route::get('/users/create',[UserController::class,'create'])->name('users.create')->middleware('isStatus','adminStatus');
        Route::post('/users/store',[UserController::class,'store'])->name('users.store')->middleware('isStatus','adminStatus');
        Route::get('/users/index',[UserController::class,'index'])->name('users.index')->middleware('isStatus','adminStatus');
        Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete')->middleware('isStatus','adminStatus');
        Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit')->middleware('isStatus','adminStatus');
        Route::post('/user/image-update',[UserController::class,'image_update'])->name('users.image.update')->middleware('isStatus','adminStatus');
        Route::post('/user/information-update',[UserController::class,'information_update'])->name('users.information.update')->middleware('isStatus','adminStatus');
        Route::post('/user/password-update',[UserController::class,'password_update'])->name('users.password.update')->middleware('isStatus','adminStatus');


        Route::get('/forms/index',[FormController::class,'index'])->name('forms.index')->middleware('studentStatus');


        Route::get('/application/create',[ApplicationController::class,'create'])->name('application.create')->middleware('studentStatus');
        Route::get('/application/index',[ApplicationController::class,'index'])->name('application.index')->middleware('studentStatus');
        Route::post('/application/store',[ApplicationController::class,'store'])->name('application.store')->middleware('studentStatus');
        Route::get('/application/delete/{id}',[ApplicationController::class,'delete'])->name('application.delete')->middleware('studentStatus');

        Route::get('/student/index',[StudentController::class,'index'])->name('student.index')->middleware('isStatus');
        Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('student.delete')->middleware('isStatus');
        Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('student.edit')->middleware('isStatus');

        Route::post('/student/store',[StudentController::class,'store'])->name('student.store')->middleware('isStatus');


    });
});
