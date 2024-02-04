<?php

use App\Http\Controllers\TokenController;
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

//rutas para pools
Route::get('/addLiquiditySuccess', 'PoolController@addLiquiditySuccess')->name('addLiquiditySuccess');
Route::get('/removeLiquidityError', 'PoolController@removeLiquidityError')->name('removeLiquidityError');
Route::get('/removeLiquiditySuccess', 'PoolController@removeLiquiditySuccess')->name('removeLiquiditySuccess');
Route::get('/createPoolSuccess', 'PoolController@createPoolSuccess')->name('createPoolSuccess');
Route::get('/deletePoolSuccess', 'PoolController@deletePoolSuccess')->name('deletePoolSuccess');

// Inicio tras login
Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

// Rutas que acceden solo desde login
Route::prefix('')->middleware('auth', 'verified')->group(function () {

});

Route::post('/tokens/create', [TokenController::class, 'createToken'])->name('createToken');