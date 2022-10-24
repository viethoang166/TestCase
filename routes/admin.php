<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\layout\NewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsController;

Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'adminLogin']);

Route::middleware('auth:admin')->group(function (){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::resource('news', NewsController::class);
    Route::resource('contact', ContactController::class);
});
