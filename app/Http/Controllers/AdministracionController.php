<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnidadesTematicas;

class AdministracionController extends Controller
{

    public function GestionarGramatica()
    {
        if (Auth::check()) {
            $bandera = "";
            return view('Administracion.GestionUnidades', compact('bandera'));
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarUnidad()
    {
        $data = request()->all();
        if ($data['accion'] == "agregar") {
            $respuesta = UnidadesTematicas::guardar($data);

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
}
