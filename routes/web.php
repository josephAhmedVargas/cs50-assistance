<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\GoogleSheetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UsersInfoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('/google-sheet', [GoogleSheetController::class, 'index'])->name('google-sheet')->middleware('auth');

Route::get('api/estudiantes', [AttendanceController::class, 'buscarEstudiantes'])->name('api.estudiantes')->middleware('auth');
Route::post('/asistencia/guardar', [AttendanceController::class, 'guardarAsistencia'])->name('asistencia.guardar')->middleware('auth');
Route::delete('/asistencia/eliminar/{id}', [AttendanceController::class, 'eliminarAsistencia'])->name('asistencia.eliminar')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/prueba', function () {
    return view('prueba');
});

Route::resource('users-information', UsersInfoController::class)->middleware('auth');

Route::resource('user-details', UserDetailController::class)->middleware('auth');
Route::put('user-info/{id}', [UsersInfoController::class, 'actualizar'])->name('user-info.update')->middleware('auth');
Route::put('user-detail/{id}', [UserDetailController::class, 'actualizar'])->name('user-detail.update')->middleware('auth');


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('attendances', AttendanceController::class);

    Route::resource('attendance-students', AttendanceStudentController::class);

    Route::get('attendances/block/{date}/{block}', [AttendanceController::class, 'blockDetails'])->name('attendances.block');
    Route::get('attendances/block/{date}/{block}/{user_id}', [AttendanceController::class, 'showDetails'])->name('attendances.details');
});

require __DIR__.'/auth.php';
