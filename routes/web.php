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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/SignUp', [SignupController::class, 'showSignupForm'])->name('Signup.form');
Route::post('/Signuppost', [SignupController::class, 'processSignup'])->name('signup.process'); 

Route::resource('users', UserController::class)->names('user');
Route::resource('barbers', BarberController::class)->names('barber');
Route::resource('services', ServiceController::class)->names('service');
Route::resource('workhours', WorkHourController::class)->names('workhour');
Route::resource('nonworkingdays', NonWorkingDayController::class)->names('nonworkingday');
Route::resource('appointments', AppointmentController::class)->names('appointment');
Route::resource('payments', PaymentController::class)->names('payment');
Route::resource('scores', ScoreController::class)->names('score');
Route::resource('promotions', PromotionController::class)->names('promotion');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
// CRUDS
Route::get('/crud', [App\Http\Controllers\CrudController::class, 'index'])->name('crud.index');
Route::get('/crudBarberos', [App\Http\Controllers\CrudController::class, 'barbers'])->name('crud.barbers');
Route::get('/crudServicios', [App\Http\Controllers\CrudController::class, 'services'])->name('crud.services');
Route::get('/crudHorarios', [App\Http\Controllers\CrudController::class, 'horarios'])->name('crud.horarios');
Route::get('/crudDiasNoLaborados', [App\Http\Controllers\CrudController::class, 'diasnolaborados'])->name('crud.diasnolaborados');
Route::get('/crudCitas', [App\Http\Controllers\CrudController::class, 'citas'])->name('crud.citas');
Route::get('/crudPagos', [App\Http\Controllers\CrudController::class, 'pagos'])->name('crud.pagos');
Route::get('/crudCalificaciones', [App\Http\Controllers\CrudController::class, 'calificaciones'])->name('crud.calificaciones');
Route::get('/crudPromociones', [App\Http\Controllers\CrudController::class, 'promociones'])->name('crud.promociones');

Route::get('/barbers', [BarberController::class, 'index'])->name('barbers.index');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users/update', [UserController::class, 'updateProfile'])->name('user.update');