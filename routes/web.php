<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\VisualizacionController;
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
Route::get('/Perfil', [UsuariosController::class,'Perfil']);
Route::get('/Logout', [UsuariosController::class,'Logout']);
Route::get('/Principal', [UsuariosController::class,'Administracion']);

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
Route::post('/AdminGramaticaLenguaje/guardarPractica', [AdministracionController::class,'guardarPractica']);
Route::post('/AdminGramaticaLenguaje/GuardarPractFin', [AdministracionController::class,'GuardarPractFin']);
Route::post('/AdminGramaticaLenguaje/consulPractPreg', [AdministracionController::class,'consulPractPreg']);
Route::post('/AdminGramaticaLenguaje/EliminarPregPract', [AdministracionController::class,'EliminarPregPract']);
Route::post('/AdminGramaticaLenguaje/CargarPractica', [AdministracionController::class,'CargarPractica']);
Route::post('/AdminGramaticaLenguaje/EliminarPractica', [AdministracionController::class,'EliminarPractica']);
///ADMINISTRAR MEDICINA TRADICIONAL
Route::get('/AdminMedicinaTradicional/GestionarMedicinaTradicional/', [AdministracionController::class,'GestionarMedicinaTradicional']);
Route::post('/AdminMedicinaTradicional/CargarMedicinaTradicional/', [AdministracionController::class,'CargarMedicinaTradicional']);
Route::post('/AdminMedicinaTradicional/GuardarMedicina', [AdministracionController::class,'GuardarMedicina']);
Route::post('/AdminMedicinaTradicional/BuscarMedicina/', [AdministracionController::class,'BuscarMedicina']);
Route::post('/AdminMedicinaTradicional/EliminarMedicina/', [AdministracionController::class,'EliminarMedicina']);


///EDITAR PREGUNTAS
Route::post('/AdminGramaticaLenguaje/consulEvalPreg', [AdministracionController::class,'consulEvalPreg']);

///ELIMINAR PREGUNTAS
Route::post('/AdminGramaticaLenguaje/ElimnarPreg', [AdministracionController::class,'ElimnarPreg']);

/////
Route::get('/Visualizacion/Modulos/{dest}', [VisualizacionController::class,'visualizacionModulo']);
/////

////VISUALIZACION GRAMATICA Y LENGUAJE
Route::post('/GramaticaLenguaje/CargarUnidades', [VisualizacionController::class,'CargarUnidades']);
Route::post('/GramaticaLenguaje/CargarTemas', [VisualizacionController::class,'CargarTemas']);
Route::post('/GramaticaLenguaje/CargarDetTemas', [VisualizacionController::class,'CargarDetTemas']);
Route::post('/GramaticaLenguaje/CargarDetPractica', [VisualizacionController::class,'CargarDetPractica']);
Route::post('/GramaticaLenguaje/CargarDetEvaluacion', [VisualizacionController::class,'CargarDetEvaluacion']);
Route::post('/GramaticaLenguaje/CargarPreguntaEvaluacion', [VisualizacionController::class,'CargarPreguntaEvaluacion']);
Route::post('/GramaticaLenguaje/RespEvaluaciones', [VisualizacionController::class,'GuardarRespEvaluaciones']);

///VISUALIZACION MEDICINA TRADICIONAL
Route::post('/MedicinaTradicional/CargarMedicina', [VisualizacionController::class,'CargarMedicina']);
Route::post('/MedicinaTradicional/CargarDetMedicina', [VisualizacionController::class,'CargarDetMedicina']);


///ADMINISTRAR MEDICINA TRADICIONAL
Route::get('/AdminUsoCostumbres/GestionarUsosCostumbres/', [AdministracionController::class,'GestionarUsosCostumbres']);
Route::post('/AdminUsoCostumbres/CargarUsosCostumbres/', [AdministracionController::class,'CargarUsosCostumbres']);
Route::post('/AdminUsoCostumbres/GuardarUso/', [AdministracionController::class,'GuardarUso']);
Route::post('/AdminUsoCostumbres/BuscarUso', [AdministracionController::class,'BuscarUso']);
Route::post('/AdminUsoCostumbres/EliminarUsos', [AdministracionController::class,'EliminarUsos']);

///VISUALIZACION  USOS Y COSTUMBRES
Route::post('/UsoCostumbres/CargarUsos', [VisualizacionController::class,'CargarUsos']);
Route::post('/UsoCostumbres/CargarDetUsos', [VisualizacionController::class,'CargarDetUsos']);

///ADMINISTRAR DICCIONARIO
Route::get('/AdminDiccionario/GestionarDiccionario/', [AdministracionController::class,'GestionarDiccionario']);
Route::post('/AdminDiccionario/CargarDiccionario', [AdministracionController::class,'CargarDiccionario']);
Route::post('/AdminDiccionario/GuardarDiccionario', [AdministracionController::class,'GuardarDiccionario']);
Route::post('/AdminDiccionario/BuscarDiccionario', [AdministracionController::class,'BuscarDiccionario']);
Route::post('/AdminDiccionario/EliminarDiccionario', [AdministracionController::class,'EliminarDiccionario']);


////VISUALIZACION DICCIONARIO
Route::post('/Diccionario/CargarPalabraDicc', [VisualizacionController::class,'CargarPalabraDicc']);
Route::post('/Diccionario/CargarDetpalabra', [VisualizacionController::class,'CargarDetpalabra']);





////PERFIL DE USUARIO
Route::post('/Usuarios/ValidarUsuario', [UsuariosController::class,'ValidarUsuario']);
Route::post('/Usuarios/ValidarIdentificacion', [UsuariosController::class,'ValidarIdentificacion']);
Route::post('/Perfil/GuardarPerfil', [UsuariosController::class,'GuardarPerfil']);