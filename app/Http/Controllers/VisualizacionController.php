<?php

namespace App\Http\Controllers;

use App\Models\OpcPractica;
use App\Models\Practicas;
use App\Models\PregPractica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnidadesTematicas;
use App\Models\Tematicas;


class VisualizacionController extends Controller
{
    public function visualizacionModulo($dest)
    {
        if (Auth::check()) {
            $bandera = "";
            if ($dest == "GramaticaLenguaje") {
                return view('Visualizacion.' . $dest, compact('bandera'));
            } else if ($dest == "temas") {
            } else if ($dest == "evaluaciones") {
            } else if ($dest == "practicas") {
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function CargarUnidades()
    {
        if (Auth::check()) {
            $Unidades = UnidadesTematicas::AllUnidades();

            if (request()->ajax()) {
                return response()->json([
                    'Unidades' => $Unidades,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    public function CargarTemas()
    {
        if (Auth::check()) {
            $idUnidad = request()->get('idUnidad');
            
            $unidad = UnidadesTematicas::BuscarUnidad($idUnidad);
            $Temas = Tematicas::AllTemas($idUnidad);
            if (request()->ajax()) {
                return response()->json([
                    'Unidad' => $unidad,
                    'Temas' => $Temas,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    public function CargarDetPractica()
    {
        if (Auth::check()) {
            $idPractica = request()->get('idPractica');
            
            $PregPractica = PregPractica::ConsulPregAll($idPractica);
            $OpcPractica = OpcPractica::ConsulGrupOpcPregAll($idPractica);
          
            if (request()->ajax()) {
                return response()->json([
                    'PregPractica' => $PregPractica,
                    'OpcPractica' => $OpcPractica,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function CargarDetTemas()
    {
        if (Auth::check()) {
            $idTema = request()->get('idTema');
            //cargar temas
            $Temas = Tematicas::BuscarTema($idTema);

            //cargar Multimedia
            $TemasMult = Tematicas::BuscarMultimedia($idTema);
            //cargar Ejemplos
            $TemasEjemplos = Tematicas::BuscarEjemplos($idTema);

            //cargar practicas
            $TemasPracticas = Practicas::allPracticas($idTema);

            if (request()->ajax()) {
                return response()->json([
                    'Temas' => $Temas,
                    'TemasMult' => $TemasMult,
                    'TemasEjemplos' => $TemasEjemplos,
                    'TemasPracticas' => $TemasPracticas,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
}
