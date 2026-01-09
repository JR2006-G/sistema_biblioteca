<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\SeudonimoController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\LibroController;

Route::get('/', fn() => redirect()->route('libros.index'));

Route::resource('autores', AutorController::class);
Route::resource('seudonimos', SeudonimoController::class);
Route::resource('editoriales', EditorialController::class);
Route::resource('libros', LibroController::class);


