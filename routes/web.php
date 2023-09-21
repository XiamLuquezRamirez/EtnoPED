<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ConvertirImagen;

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

//ADMINITRACCION GRAMATICA Y LENGUAJE - GESTIONAR TEMAS
Route::get('/AdminGramaticaLenguaje/GestionarGramatica/{ori}/{id}', [AdministracionController::class,'GestionarGramatica']);
Route::post('/AdminGramaticaLenguaje/GuardarUnidad', [AdministracionController::class,'GuardarUnidad']);
Route::post('/AdminGramaticaLenguaje/CargarUnidades', [AdministracionController::class,'CargarUnidades']);
Route::post('/AdminGramaticaLenguaje/BuscarUnidad', [AdministracionController::class,'BuscarUnidad']);
Route::post('/AdminGramaticaLenguaje/EliminarUnidad', [AdministracionController::class,'EliminarUnidad']);
Route::post('/AdminGramaticaLenguaje/CargarUnidadesSelect', [AdministracionController::class,'CargarUnidadesSelect']);
Route::post('/AdminGramaticaLenguaje/GuardarTema', [AdministracionController::class,'GuardarTema']);
Route::post('/AdminGramaticaLenguaje/CargarTemas', [AdministracionController::class,'CargarTemas']);
Route::post('/AdminGramaticaLenguaje/BuscarTema', [AdministracionController::class,'BuscarTema']);
Route::post('/AdminGramaticaLenguaje/eliminarMultimedia', [AdministracionController::class,'eliminarMultimedia']);
Route::post('/AdminGramaticaLenguaje/eliminarEjemplo', [AdministracionController::class,'eliminarEjemplo']);
Route::post('/AdminGramaticaLenguaje/EliminarTema', [AdministracionController::class,'EliminarTema']);
//ADMINITRACCION GRAMATICA Y LENGUAJE - GESTIONAR EVALUACIONES
Route::post('/AdminGramaticaLenguaje/CargarEvaluaciones', [AdministracionController::class,'CargarEvaluaciones']);
Route::post('/AdminGramaticaLenguaje/guardarEvaluacion', [AdministracionController::class,'guardarEvaluacion']);
Route::post('/AdminGramaticaLenguaje/GuardarEvalFin', [AdministracionController::class,'GuardarEvalFin']);
Route::post('/AdminGramaticaLenguaje/EliminarEvaluacion', [AdministracionController::class,'EliminarEvaluacion']);
Route::post('/AdminGramaticaLenguaje/CargarEvaluacion', [AdministracionController::class,'CargarEvaluacion']);
Route::post('/Guardar/VideoEval', [AdministracionController::class,'VideoEval']);
///ADMINITRACCION GRAMATICA Y LENGUAJE - GESTIONAR PRACTICAS
Route::post('/AdminGramaticaLenguaje/CargarPracticas', [AdministracionController::class,'CargarPracticas']);



///EDITAR PREGUNTAS
Route::post('/AdminGramaticaLenguaje/consulEvalPreg', [AdministracionController::class,'consulEvalPreg']);

///ELIMINAR PREGUNTAS
Route::post('/AdminGramaticaLenguaje/ElimnarPreg', [AdministracionController::class,'ElimnarPreg']);



