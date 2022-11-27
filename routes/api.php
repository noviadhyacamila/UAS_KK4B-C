<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public route
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/tiket', [TiketController::class, 'index']);
Route::get('/tiket/{id}', [TiketController::class, 'show']);
//*Route::post('/tiket', [TiketController::class, 'store']);
//*Route::put('/tiket/{id}', [TiketController::class, 'update']);
//*Route::delete('/tiket/{id}', [TiketController::class, 'destroy']);

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
//Route::post('/transaksi', [TransaksiController::class, 'store']);
//Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
//Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);

// protected routes (yang melewati sanctum)
Route::middleware('auth:sanctum')->group(function (){
    Route::resource('tiket', TiketController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('transaksi', TransaksiController::class)->except('create', 'edit', 'show', 'index');
});