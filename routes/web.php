<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UbicacionMontejoController;
use App\Http\controllers\CampoController;
use App\Http\Controllers\AnuncioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Calendario
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/get', [EventController::class, 'getEvents']);
Route::post('/events/store', [EventController::class, 'store']);

Route::view('/actividades_Modelo', 'actividades_Modelo')->name('actividades_Modelo_view');
Route::view('/centro_cultural', 'centro_cultural')->name('centro_cultural');
Route::view('/campos_modelo', 'campos_modelo')->name('campos_Modelo_view');
Route::view('/transporte', 'transporte')->name('transporte_view');
Route::view('/actividades_detalles', 'actividades_detalles')->name('actividades_detalles');
Route::view('/configuracion', 'configuracion')->name('configuracion');

// Permisos
Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos.index');
Route::post('/permisos', [PermisosController::class, 'store'])->name('permisos.store');

//transporte
//Route::get('/transporte', [VehiculoController::class, 'getSelect'])->name('transporte');
Route::resource('vehiculos', VehiculoController::class);
//actividades
Route::get('/actividades_Modelo/get', [VehiculoController::class, 'getSelect']);
Route::resource('ubicacion', UbicacionController::class);

//actividades montejo
Route::get('/centro_cultural/get', [VehiculoController::class, 'getSelect']);
Route::resource('ubicacion_montejo', UbicacionMontejoController::class);

//campos
Route::get('/campos_Modelo', [VehiculoController::class, 'getSelect'])->name('campos_Modelo');
Route::resource('campos', CampoController::class);

//anuncios
Route::get('/', [AnuncioController::class, 'index'])->name('home');
Route::post('/anuncio', [AnuncioController::class, 'store'])->middleware('auth');

// eventos
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/list', [EventController::class, 'getEvents']);
Route::post('/events', [EventController::class, 'store']);
