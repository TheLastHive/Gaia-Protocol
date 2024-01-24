<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Inicio
Route::get('/', function () {
    return view('welcome');
});

// Inicio tras login
Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

// Rutas que acceden solo desde login
Route::prefix('')->middleware('auth', 'verified')->group(function () {

});
