<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnidadesTematicas;

class AdministracionController extends Controller
{

    public function GestionarGramatica($ori)
    {
        if (Auth::check()) {
            $bandera = "";
            if($ori=="unidades"){
                return view('Administracion.GestionUnidades', compact('bandera'));
            }else if($ori=="temas"){
                return view('Administracion.GestionarTematica', compact('bandera'));

            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarUnidad()
    {
        $data = request()->all();
        if ($data['accion'] == "agregar") {
            $respuesta = UnidadesTematicas::guardar($data);
        }else if ($data['accion'] == "editar"){
            $respuesta = UnidadesTematicas::editar($data);
        }
            if ($respuesta) {
                $estado = "ok";
            } else {
                $estado = "fail";
            }

            if (request()->ajax()) {
                return response()->json([
                    'estado' => $estado
                ]);
            }
    }

    public function EliminarUnidad(){
        $idUndad = request()->get('idUnidad');
        $unidades = UnidadesTematicas::EliminarUnidad($idUndad);
    }

    public function CargarUnidades()
    {
        $unidades = UnidadesTematicas::CargarTodos();
        if (request()->ajax()) {
            return response()->json([
                'unidades' => $unidades
            ]);
        }
    }

    public function BuscarUnidad()
    {
        $idUndad = request()->get('idUnidad');
        $unidades = UnidadesTematicas::BuscarUnidad($idUndad);

        if (request()->ajax()) {
            return response()->json([
                'unidades' => $unidades
            ]);
        }
    }
}
