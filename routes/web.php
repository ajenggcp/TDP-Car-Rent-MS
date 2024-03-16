<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\AuthController;

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
    return view('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/mobil/', 'App\Http\Controllers\MobilController@index');
Route::get('/mobil/manajemen', 'App\Http\Controllers\MobilController@index')->name('manajemen');
Route::post('/mobil/add', 'App\Http\Controllers\MobilController@add');
Route::get('/mobil/search', 'App\Http\Controllers\MobilController@search');

Route::post('/mobil/peminjaman/add', 'App\Http\Controllers\PeminjamanController@add');
Route::get('/mobil/peminjaman', 'App\Http\Controllers\PeminjamanController@index')->name('peminjaman');

//authorization
Auth::routes();