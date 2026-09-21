<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\siteController;
use Illuminate\Support\Facades\Route;

//SITE
Route::get('/', [siteController::class, 'index'])->name('site.index');

//LOGIN
route::get('/login', [LoginController::class, 'index'])->name('site.login');
route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
route::get('/register', [RegisterController::class, 'index'])->name('site.register');
route::post('/register', [RegisterController::class, 'store'])->name('auth.register');

//AUTH
Route::middleware(['auth'])->group(function () {
    route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    //HABITS
    Route::resource('/dashboard/habits', HabitController::class)->except('show');
    Route::get('/dashboard/habits/historico', [HabitController::class, 'history'])->name('habits.history');
    Route::get('/dashboard/habits/configurar', [HabitController::class, 'settings'])->name('habit.settings');
    Route::post('/dashboard/habits/{habit}/toglle', [HabitController::class, 'toggle'])->name('habit.toggle');
});



