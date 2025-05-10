<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';


use App\Http\Controllers\UserController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkHourController;
use App\Http\Controllers\NonWorkingDayController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PromotionController;

Route::resource('users', UserController::class);
Route::resource('barbers', BarberController::class);
Route::resource('services', ServiceController::class);
Route::resource('workhours', WorkHourController::class);
Route::resource('nonworkingdays', NonWorkingDayController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('payments', PaymentController::class);
Route::resource('scores', ScoreController::class);
Route::resource('promotions', PromotionController::class);