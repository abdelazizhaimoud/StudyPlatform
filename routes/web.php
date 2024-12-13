<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/dashboard',[dashboardController::class,'dashboard'])->name('dashboard');

Route::get('/login',[loginController::class,'login'])->name('login');
Route::post('/login',[loginController::class,'signin'])->name('signin');
Route::get('/signup',[loginController::class,'signup'])->name('signup');
Route::post('/signup',[loginController::class,'register'])->name('register');

// Route::post('/logout',[loginController::class],'logout')->name('logout');
Route::post('/logout',[loginController::class,'logout'])->name('logout');