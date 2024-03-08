<?php

use App\Http\Controllers\ActoreController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
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
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//peliculas
Route::resource("/peliculas", PeliculaController::class);


//series
Route::get('/series', [SerieController::class, 'index'])->name('series.index');
Route::get('/series/create', [SerieController::class, 'create'])->name('series.create');
Route::post('/series/store', [SerieController::class, 'store'])->name('series.store');
Route::get('/series/{serie}', [SerieController::class, 'show'])->name('series.show');
Route::get('/series/{serie}/edit', [SerieController::class, 'edit'])->name('series.edit');
Route::put('/series/{serie}/update', [SerieController::class, 'update'])->name('series.update');
Route::delete('/series/{serie}/delete', [SerieController::class, 'destroy'])->name('series.destroy');

//comprobar esto echo por Ander uwu <------------------------------------------------------------------------------------------------------------------------------------------------------------------

//series temporadas
Route::get('/series/{serie}/temporadas', [TemporadaController::class, 'index'])->name('temporadas.index');
Route::get('/series/{serie}/temporadas/create', [TemporadaController::class, 'create'])->name('temporadas.create');
Route::post('/series/{serie}/temporadas/store', [TemporadaController::class, 'store'])->name('temporadas.store');
Route::get('/series/{serie}/temporadas/{temporada}', [TemporadaController::class, 'show'])->name('temporadas.show');
Route::get('/series/{serie}/temporadas/{temporada}/edit', [TemporadaController::class, 'edit'])->name('temporadas.edit');
Route::put('/series/{serie}/temporadas/{temporada}/update', [TemporadaController::class, 'update'])->name('temporadas.update');
Route::delete('/series/{serie}/temporadas/{temporada}/delete', [TemporadaController::class, 'destroy'])->name('temporadas.destroy');

//series temporadas episodios
Route::get('/series/{serie}/temporadas/{temporada}/episodios', [EpisodioController::class, 'index'])->name('episodios.index');
Route::get('episodios/{serie},{temporada}/create', [EpisodioController::class, 'create'])->name('episodios.create');
Route::post('/series/{serie}/temporadas/{temporada}/episodios/store', [EpisodioController::class, 'store'])->name('episodios.store');
Route::get('/series/{serie}/temporadas/{temporada}/episodios/{episodio}', [EpisodioController::class, 'show'])->name('episodios.show');
Route::get('/series/{serie}/temporadas/{temporada}/episodios/{episodio}/edit', [EpisodioController::class, 'edit'])->name('episodios.edit');
Route::put('/series/{serie}/temporadas/{temporada}/episodios/{episodio}/update', [EpisodioController::class, 'update'])->name('episodios.update');
Route::delete('/series/{serie}/temporadas/{temporada}/episodios/{episodio}/delete', [EpisodioController::class, 'destroy'])->name('episodios.destroy');

//categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}/update', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}/delete', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

//actores
Route::get('/actores', [ActoreController::class, 'index'])->name('actores.index');
Route::get('/actores/create', [ActoreController::class, 'create'])->name('actores.create');
Route::post('/actores/store', [ActoreController::class, 'store'])->name('actores.store');
Route::get('/actores/{actore}', [ActoreController::class, 'show'])->name('actores.show');
Route::get('/actores/{actore}/edit', [ActoreController::class, 'edit'])->name('actores.edit');
Route::put('/actores/{actore}/update', [ActoreController::class, 'update'])->name('actores.update');
Route::delete('/actores/{actore}/delete', [ActoreController::class, 'destroy'])->name('actores.destroy');

//usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{user}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{user}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{user}/update', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{user}/delete', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

//perfil
Route::get('/perfil', function () {
    return view('perfil');
})->name("perfil");

Route::put('/perfil/{user}/update', [UserProfileController::class, 'update'])->name('perfil.update');
