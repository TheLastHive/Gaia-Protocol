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

Route::get('/', function () {
    return view('welcome');
});

//rutas para pools
Route::get('/addLiquiditySuccess', 'PoolController@addLiquiditySuccess')->name('addLiquiditySuccess');
Route::get('/removeLiquidityError', 'PoolController@removeLiquidityError')->name('removeLiquidityError');
Route::get('/removeLiquiditySuccess', 'PoolController@removeLiquiditySuccess')->name('removeLiquiditySuccess');
Route::get('/createPoolSuccess', 'PoolController@createPoolSuccess')->name('createPoolSuccess');
Route::get('/deletePoolSuccess', 'PoolController@deletePoolSuccess')->name('deletePoolSuccess');
