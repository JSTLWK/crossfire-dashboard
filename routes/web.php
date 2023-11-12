<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', HomeController::class)->name('home');
Route::post('/signup', SignupController::class)->name('signup');

// TODO: change password reset route (https://laravel.com/docs/10.x/passwords#resetting-the-password)
Route::get('/confirm/account/{token}', function (string $token) {
    return Inertia::render('Auth/ConfirmAccount', ['token' => $token]);
})->middleware('guest')->name('confirm.account');

Route::get('/password/reset/{token}', function (string $token) {
    return Inertia::render('Auth/ResetPassword', ['token' => $token]);
})->middleware('guest')->name('password.reset-token');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/step/first-not-completed', [StepController::class, 'firstToComplete'])->name('step.first-to-complete');
    Route::get('/step/completed', [StepController::class, 'completed'])->name('step.completed');
    Route::get('/step/{step}', [StepController::class, 'step'])->name('step.progress');
    Route::post('/step/{step}', [StepController::class, 'store'])->name('step.store');

    Route::resource('team', TeamController::class);

});
