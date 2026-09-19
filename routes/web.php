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

    route::get('/dashboard', [siteController::class, 'dashboard'])->name('site.dashboard');
    route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    //habits
    route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habit.create');
    route::post('/dashboard/habits', [HabitController::class, 'store'])->name('habit.store');
    route::delete('/dashboard/habits/{habit}', [HabitController::class, 'destroy'])->name('habit.destroy');
});



