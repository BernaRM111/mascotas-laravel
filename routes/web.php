<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\MascotasController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/nosotros', [NosotrosController::class, 'index']);
// Route::get('/servicios', [ServiciosController::class, 'index']);
// Route::get('/citas', [CitasController::class, 'index']);
// Route::get('/mascotas', [MascotasController::class, 'index']);

Route::resource('mascotas', MascotasController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('citas', CitasController::class);






