<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login',[loginController::class,'login'])->name('login');
Route::get('/signup',[loginController::class,'signup'])->name('signup');
Route::post('/signup',[loginController::class,'register'])->name('register');
Route::post('/login',[loginController::class,'signin'])->name('signin');