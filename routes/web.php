<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisosController;

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

Route::view('/actividades_modelo', 'actividades_modelo')->name('actividades_Modelo');
Route::view('/centro_cultural', 'centro_cultural')->name('centro_cultural');
Route::view('/campos_Modelo', 'campos_Modelo')->name('campos_Modelo');
Route::view('/transporte', 'transporte')->name('transporte');
Route::view('/actividades_detalles', 'actividades_detalles')->name('actividades_detalles');
Route::view('/configuracion', 'configuracion')->name('configuracion');


// eventos
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/list', [EventController::class, 'getEvents']);
Route::post('/events', [EventController::class, 'store']);
