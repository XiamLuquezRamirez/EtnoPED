<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AdministracionController;

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
    return view('Login');
});


///INICIO DE SESIÓN
Route::post('/Login', [UsuariosController::class,'Login']);
Route::get('/Logout', [UsuariosController::class,'Logout']);
Route::get('/Administracion', [UsuariosController::class,'Administracion']);

//ADMINITRACCION GRAMATICA Y LENGUAJE
Route::get('/AdminGramaticaLenguaje/GestionarGramatica/{ori}', [AdministracionController::class,'GestionarGramatica']);
Route::post('/AdminGramaticaLenguaje/GuardarUnidad', [AdministracionController::class,'GuardarUnidad']);
Route::post('/AdminGramaticaLenguaje/CargarUnidades', [AdministracionController::class,'CargarUnidades']);
Route::post('/AdminGramaticaLenguaje/BuscarUnidad', [AdministracionController::class,'BuscarUnidad']);
Route::post('/AdminGramaticaLenguaje/EliminarUnidad', [AdministracionController::class,'EliminarUnidad']);


