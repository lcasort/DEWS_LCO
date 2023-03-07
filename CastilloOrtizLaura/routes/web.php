<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ModuloController;
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

Route::controller(ModuloController::class)->group(function () {
    Route::get('/modulos/{id}/alumnos', 'list')->name('modulo.alumnos');
});

Route::controller(AlumnoController::class)->group(function () {
    Route::get('/alumnos', 'index')->name('alumnos');
    Route::post('/alumnos', 'store')->name('alumno.store');
    Route::post('/alumnos/{modulo}', 'store_modulo')->name('alumno.store_modulo');
});
