<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/profile/edit/{id}', [HomeController::class, 'editProfile'])->name('profile.edit')->middleware('auth');
Route::patch('/profile/update/{id}', [HomeController::class, 'updateProfile'])->name('profile.update')->middleware('auth');