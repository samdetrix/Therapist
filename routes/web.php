<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;

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

Route::get('register', [ComponentsController::class, 'LoadSignInPage'])->name('register.page');
Route::post('register-user', [UserController::class, 'RegisterUser'])->name('register.user');
Route::get('/', [ComponentsController::class, 'LoadLoginPage'])->name('login.page');
Route::post('user-login', [UserController::class, 'LoginUser'])->name('login.user');
Route::get('user-logout', [UserController::class, 'Logout'])->name('logout.user');

Route::group(['middleware' => ['active']], function () {
    Route::get('therapists', [ComponentsController::class, 'LoadTherapists'])->name('therapists.list');
    Route::get('therapists', [ComponentsController::class, 'LoadTherapists'])->name('therapists.list');
    Route::get('add-therapists', [ComponentsController::class, 'AddTherapists'])->name('therapists.add');
    Route::post('therapist', [TherapistController::class, 'RegisterTherapist'])->name('register.therapist');
    Route::get('therapists/{therapist}/edit', [TherapistController::class, 'edit'])->name('therapists.edit');
    Route::get('therapists/{therapist}', [TherapistsController::class, 'show'])->name('therapists.show');
    Route::put('therapists/{therapist}', [TherapistController::class, 'update'])->name('therapists.update');
    Route::delete('therapists/{therapist}', [TherapistController::class, 'destroy'])->name('therapists.destroy');
    Route::get('rooms', [RoomsController::class, 'index'])->name('rooms.index');
    Route::get('rooms/create', [RoomsController::class, 'create'])->name('rooms.create');
    Route::post('rooms', [RoomsController::class, 'store'])->name('rooms.store');
    Route::get('rooms/{room}/edit', [RoomsController::class, 'edit'])->name('rooms.edit');
    Route::put('rooms/{room}', [RoomsController::class, 'update'])->name('rooms.update');
    Route::delete('rooms/{room}', [RoomsController::class, 'destroy'])->name('rooms.destroy');
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('appointments/{appointment}', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::get('dashbard', [ComponentsController::class, 'TherapistDashboard'])->name('therapist.dashboard');
    Route::get('therapist-appointments', [ComponentsController::class, 'LoadTherapyAppointments'])->name('therapist.appointments');
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::post('update-appointment/', [AppointmentController::class, 'UpdateAppointmentStatus'])
        ->name('update.status');
    Route::get('admin-dashboard', [ComponentsController::class, 'LoadAdminDashboard'])->name('admin.dashboard');
    Route::get('therapists', [ComponentsController::class, 'LoadTherapists'])->name('therapists.list');
    Route::get('add-therapists', [ComponentsController::class, 'AddTherapists'])->name('therapists.add');
    Route::post('therapist', [TherapistController::class, 'RegisterTherapist'])->name('register.therapist');
    Route::get('therapists/{therapist}/edit', [TherapistController::class, 'edit'])->name('therapists.edit');
    Route::get('therapists/{therapist}', [TherapistsController::class, 'show'])->name('therapists.show');
    Route::put('therapists/{therapist}', [TherapistController::class, 'update'])->name('therapists.update');
    Route::delete('therapists/{therapist}', [TherapistController::class, 'destroy'])->name('therapists.destroy');
});
