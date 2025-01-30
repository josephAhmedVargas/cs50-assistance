<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UsersInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users-information', UsersInfoController::class);

    Route::resource('user-details', UserDetailController::class);

    Route::resource('attendances', AttendanceController::class);

    Route::resource('attendance-students', AttendanceStudentController::class);

    Route::get('attendances/block/{date}/{block}', [AttendanceController::class, 'blockDetails'])->name('attendances.block');

});

require __DIR__.'/auth.php';
