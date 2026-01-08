<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\SeudonimoController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\LibroController;

// RUTA PRINCIPAL → SISTEMA
Route::get('/', function () {
    return redirect()->route('autores.index');
});

// AUTORES
Route::resource('autores', AutorController::class);

// SEUDÓNIMOS
Route::resource('seudonimos', SeudonimoController::class);

// EDITORIALES
Route::resource('editoriales', EditorialController::class);

// LIBROS
Route::resource('libros', LibroController::class);
