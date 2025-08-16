<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AuthController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});


