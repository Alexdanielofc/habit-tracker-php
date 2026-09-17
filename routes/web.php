<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\siteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [siteController::class, "index"]);

route::get('/login', [LoginController::class, "index"]);
route::post('/login', [LoginController::class, "authenticate"]);
