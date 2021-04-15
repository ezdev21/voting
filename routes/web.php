<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('candidates',[CandidateController::class,'index'])->name('candidates');
Route::get('register',[CandidateController::class,'register'])->name('register');
Route::post('register',[CandidateController::class,'store'])->name('register.submit');
Route::post('/vote/{candidate}/{user}',[CandidateController::class,'vote']);