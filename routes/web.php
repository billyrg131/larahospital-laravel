<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/doctor', [HomeController::class, 'doctors']);
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/adddoctorview', [AdminController::class, 'addview']);
Route::post('/uploaddoctor', [AdminController::class, 'uploaddoctor']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/showappointment', [HomeController::class, 'showappointment']);
Route::get('/cancelappointment/{id}', [HomeController::class, 'cancelappointment']);
Route::get('/adminappointment', [AdminController::class, 'adminappointment']);
Route::get('/approveappointment/{id}', [AdminController::class, 'approveappointment']);
Route::get('/cancelappoint/{id}', [AdminController::class, 'cancelappoint']);
Route::get('/showdoctor', [AdminController::class, 'showdoctor']);
Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);
Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);
Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
