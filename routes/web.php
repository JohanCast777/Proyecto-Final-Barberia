<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;

use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkHourController;
use App\Http\Controllers\NonWorkingDayController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SignupController;

// Mostrar el formulario de login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('main');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

Route::get('/SignUp', [SignupController::class, 'showSignupForm'])->name('Signup.form');
Route::post('/Signuppost', [SignupController::class, 'processSignup'])->name('signup.process'); 

Route::resource('users', UserController::class)->names('user');
Route::resource('barbers', BarberController::class);
Route::resource('services', ServiceController::class);
Route::resource('workhours', WorkHourController::class);
Route::resource('nonworkingdays', NonWorkingDayController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('payments', PaymentController::class);
Route::resource('scores', ScoreController::class);
Route::resource('promotions', PromotionController::class);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/crud', [App\Http\Controllers\CrudController::class, 'index'])->name('crud.index');

