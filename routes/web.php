<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CandidateController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[CandidateController::class,'index'])->name('candidates');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('vote')->group(function (){
    Route::get('candidates',[CandidateController::class,'index'])->name('candidates');
    Route::get('register',[CandidateController::class,'register'])->name('vote.register');
    Route::post('register',[CandidateController::class,'store'])->name('vote.register.submit');
    Route::get('result',[CandidateController::class,'result']);
    Route::post('vote',[CandidateController::class,'vote']);
});

