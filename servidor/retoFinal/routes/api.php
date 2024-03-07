<?php

use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APIBuscarController;
use App\Http\Controllers\APIDescargasController;
use App\Http\Controllers\APIHomeController;
use App\Http\Controllers\APIMiListaController;
use App\Http\Controllers\APIPeliculaController;
use App\Http\Controllers\APISerieController;
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
Route::middleware('auth.jwt')->post('/buscarPelicula', [APIPeliculaController::class, 'BuscarPelicula']);
Route::middleware('auth.jwt')->post('/buscarSerie', [APISerieController::class, 'BuscarSerie']);
Route::middleware('auth.jwt')->get('/buscar', [APIBuscarController::class, "buscar"]);
Route::middleware('auth.jwt')->get('/milista', [APIMiListaController::class, "comprobar"]);
Route::middleware('auth.jwt')->post('/milista', [APIMiListaController::class, "anadir"]);
Route::middleware('auth.jwt')->delete('/milista', [APIMiListaController::class, "eliminar"]);
Route::middleware('auth.jwt')->post('/descarga/pelicula', [APIDescargasController::class, "pelicula"]);
Route::middleware('auth.jwt')->post('/descarga/episodio', [APIDescargasController::class, "episodio"]);
Route::post('/login', [APIAuthController::class, 'login'])->name('login');
