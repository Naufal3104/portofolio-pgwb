<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JenisKontakController;
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
route::middleware('auth')->group(function(){
    Route::resource('siswa', SiswaController::class);
    Route::resource('project', ProjectController::class);   
    Route::resource('contact', ContactController::class);
    Route::resource('jeniscontact', JenisKontakController::class);
});

Route::resource('/', DashboardController::class)->middleware('auth');

Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('login',[LoginController::class, 'authenticate']);

Route::post('logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth');




