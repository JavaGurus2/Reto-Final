<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIBuscarController;
use App\Http\Controllers\APIHomeController;
use App\Http\Controllers\APIPeliculaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.jwt')->get('/peliculas', [APIHomeController::class, 'index']);
Route::middleware('auth.jwt')->get('/home', [APIHomeController::class, 'rellenar']);
Route::middleware('auth.jwt')->get('/home/{categoria}', [APIHomeController::class, "filtro"]);
Route::middleware('auth.jwt')->put('/perfilDP', [APIAuthController::class, 'UserDP']);
Route::middleware('auth.jwt')->put('/perfilC', [APIAuthController::class, 'UserC']);
Route::middleware('auth.jwt')->put('/buscarPelicula', [APIPeliculaController::class, 'BuscarPelicula']);
Route::middleware('auth.jwt')->put('/buscarSerie', [APISerieController::class, 'BuscarSerie']);
Route::middleware('auth.jwt')->get('/buscar', [APIBuscarController::class, 'buscar']);
Route::post('/login', [APIAuthController::class, 'login'])->name('login');
