<?php

use App\Http\Controllers\PoolController;
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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pools', [PoolController::class, 'showAllPools'])->name('pools.showAll');
    Route::get('/mypools', [PoolController::class, 'showMyPools'])->name('pools.showMy');
    Route::post('/addLiquidity', [PoolController::class, 'addLiquidity'])->name('addLiquidity');
    Route::post('/removeLiquidity', [PoolController::class, 'removeLiquidity'])->name('removeLiquidity');
    Route::post('/createPool', [PoolController::class, 'createPool'])->name('createPool');
    Route::delete('/deletePool/{poolId}', [PoolController::class, 'deletePool'])->name('deletePool');
});

// Inicio tras login
Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);

//! si se quiere añadir mas variables como tokens a la vista home se crea un metodo en el controlador home que extienda
//! todos los metodos con las variables necesarias
Route::get('/home', [PoolController::class, 'showHomePools'])->middleware(['auth', 'verified']);

// Rutas que acceden solo desde login
Route::prefix('')->middleware('auth', 'verified')->group(function () {
});

Route::post('/tokens/create', [TokenController::class, 'createToken'])->name('createToken');
