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
    return view('cita.index');
}) -> middleware("auth");

/* Omite la seccion de registrar y de recordar password */
Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/cita', [App\Http\Controllers\CitaController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/cita/view', [App\Http\Controllers\CitaController::class, 'show']);
    Route::post('/cita/new', [App\Http\Controllers\CitaController::class, 'store']);
    Route::post('/cita/edit/{id}', [App\Http\Controllers\CitaController::class, 'edit']);
    Route::post('/cita/update/{cita}', [App\Http\Controllers\CitaController::class, 'update']);
    Route::post('/cita/delete/{id}', [App\Http\Controllers\CitaController::class, 'destroy']);

});