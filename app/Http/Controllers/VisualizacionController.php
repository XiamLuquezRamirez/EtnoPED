<?php

namespace App\Http\Controllers;

use App\Models\CosEval;
use App\Models\EvalPregComplete;
use App\Models\EvalPregDidact;
use App\Models\EvalPregEnsay;
use App\Models\EvalRelacione;
use App\Models\EvalRelacioneOpc;
use App\Models\EvalTaller;
use App\Models\Evaluacion;
use App\Models\EvalVerFal;
use App\Models\Log;
use App\Models\OpcPractica;
use App\Models\OpcPregMul;
use App\Models\Practicas;
use App\Models\PregOpcMul;
use App\Models\PregPractica;
use App\Models\PregRelacione;
use App\Models\RespEvalEnsay;
use App\Models\RespEvalComp;
use App\Models\RespEvalRelacione;
use App\Models\RespEvalTaller;
use App\Models\LibroCalificaciones;
use App\Models\MedicinaTradicional;
use App\Models\UpdIntEval;
use App\Models\RespMultPreg;
use App\Models\RespVerFal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnidadesTematicas;
use App\Models\Tematicas;
use App\Models\UsosCostumbres;

class VisualizacionController extends Controller
{
    public function visualizacionModulo($dest)
    {
        if (Auth::check()) {
            $bandera = "";
            if ($dest == "GramaticaLenguaje") {
                return view('Visualizacion.' . $dest, compact('bandera'));
            } else if ($dest == "MedicinaTradicional") {
                return view('Visualizacion.' . $dest, compact('bandera'));
            } else if ($dest == "UsosCostumbres") {
                return view('Visualizacion.' . $dest, compact('bandera'));
            } else if ($dest == "Diccionario") {
                return view('Visualizacion.' . $dest, compact('bandera'));
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
    public function CargarMedicina()
    {
        if (Auth::check()) {
            $Medicinas = MedicinaTradicional::AllMedicina();

            if (request()->ajax()) {
                return response()->json([
                    'Medicinas' => $Medicinas,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    public function CargarUsos()
    {
        if (Auth::check()) {
            $Usos = UsosCostumbres::AllUso();

            if (request()->ajax()) {
                return response()->json([
                    'Usos' => $Usos,
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
    public function CargarDetMedicina()
    {
        if (Auth::check()) {
            $idMedicina = request()->get('idMedicina');
            
            $Medicina = MedicinaTradicional::BuscarMedi($idMedicina);
          
            if (request()->ajax()) {
                return response()->json([
                    'Medicina' => $Medicina
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    public function CargarDetUsos()
    {
        if (Auth::check()) {
            $idUso = request()->get('idUso');
            
            $detUsos = UsosCostumbres::BuscarUso($idUso);
          
            if (request()->ajax()) {
                return response()->json([
                    'detUsos' => $detUsos
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
          
            //cargar evaluacion
            if(Auth::user()->tipo_usuario=="Estudiante"){
                $TemasEvaluacion = Evaluacion::allEvaluacionEst($idTema);
            }else{
                $TemasEvaluacion = Evaluacion::allEvaluacion($idTema);
            }

            if (request()->ajax()) {
                return response()->json([
                    'Temas' => $Temas,
                    'TemasMult' => $TemasMult,
                    'TemasEjemplos' => $TemasEjemplos,
                    'TemasPracticas' => $TemasPracticas,
                    'TemasEvaluacion' => $TemasEvaluacion,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function CargarDetEvaluacion(){
        if (Auth::check()) {
            $idEvaluacion = request()->get('idEvaluacion');
            $DesEva = Evaluacion::BusEval($idEvaluacion);

            $DatEva = Evaluacion::DatosEvla($DesEva->id);
           
            if(Auth::user()->tipo_usuario!="Estudiante"){
                $intreal = 0;
            } else {
                $intreal = $DatEva->int_realizados;
            }

            $titulo = $DesEva->titulo;
            $intentos_perm = $DesEva->intentos_perm;
            $enunciado = $DesEva->enunciado;
            $tiempo = $DesEva->tiempo;
            $hab_tiempo = $DesEva->hab_tiempo;
            $intentos_real = $intreal;
            $perfil = Auth::user()->tipo_usuario;

            $ideva = $DesEva->id;

            $Log = Log::Guardar('Visualizacion de Evaluación', $ideva);

            $PregEval = CosEval::GrupPreg($ideva);

            /////CONSULTAR VIDEO
            $VideoEval = EvalPregDidact::PregDida($ideva);
            $video = "no";
            $id = "no";
            if ($VideoEval) {
                $video = $VideoEval->cont_didactico;
                $id = $VideoEval->id;
            }

            if (request()->ajax()) {
                return response()->json([
                    'titulo' => $titulo,
                    'int_perm' => $intentos_perm,
                    'int_realizados' => $intentos_real,
                    'enunciado' => $enunciado,
                    'tiempo' => $tiempo,
                    'hab_tiempo' => $hab_tiempo,
                    'perfil' => $perfil,
                    'Evaluacion' => $DesEva,
                    'PregEval' => $PregEval->shuffle(),
                    'VideoEval' => $video,
                    'idvideo' => $id
                ]);
            }

        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function CargarPreguntaEvaluacion(){
        
        if (Auth::check()) {
            $IdPreg = request()->get('Pregunta');
            $TipPreg = request()->get('TipPregunta');

            if ($TipPreg == "PREGENSAY") {
                $PregEnsayo = EvalPregEnsay::consulPregEnsay($IdPreg);
                $RespPregEnsayo = RespEvalEnsay::DesResp($IdPreg, Auth::user()->id);
                if (request()->ajax()) {
                    return response()->json([
                        'PregEnsayo' => $PregEnsayo,
                        'RespPregEnsayo' => $RespPregEnsayo,
                    ]);
                }
            } else if ($TipPreg == "COMPLETE") {
                $PregComple = EvalPregComplete::ConsultComplete($IdPreg);
                $RespPregComple = RespEvalComp::DesResp($IdPreg, Auth::user()->id);
                if (request()->ajax()) {
                    return response()->json([
                        'PregComple' => $PregComple,
                        'RespPregComple' => $RespPregComple,
                    ]);
                }
            } else if ($TipPreg == "OPCMULT") {
                $PregMult = PregOpcMul::ConsulPreg($IdPreg);
                $OpciMult = OpcPregMul::ConsulGrupOpcPreg($IdPreg);
                $RespPregMul = OpcPregMul::BuscOpcResp($IdPreg, Auth::user()->id);

                if (request()->ajax()) {
                    return response()->json([
                        'PregMult' => $PregMult,
                        'OpciMult' => $OpciMult,
                        'RespPregMul' => $RespPregMul,
                    ]);
                }
            } else if ($TipPreg == "VERFAL") {
                $PregVerFal = EvalVerFal::ConVerFal($IdPreg);
                $RespPregVerFal = EvalVerFal::VerFalResp($IdPreg, Auth::user()->id);
                if (request()->ajax()) {
                    return response()->json([
                        'PregVerFal' => $PregVerFal,
                        'RespPregVerFal' => $RespPregVerFal,
                    ]);
                }
            } else if ($TipPreg == "RELACIONE") {
                $PregRelacione = PregRelacione::ConRela($IdPreg);
                $PregRelIndi = EvalRelacione::PregRelDef($IdPreg);
                $PregRelResp = EvalRelacioneOpc::PregRelOpc($IdPreg);
                $PregRelRespAdd = EvalRelacioneOpc::PregRelOpcAdd($IdPreg);

                $RespPregRelacione = RespEvalRelacione::RelacResp($IdPreg, Auth::user()->id);

                if (request()->ajax()) {
                    return response()->json([
                        'PregRelacione' => $PregRelacione,
                        'PregRelIndi' => $PregRelIndi,
                        'PregRelResp' => $PregRelResp,
                        'PregRelRespAdd' => $PregRelRespAdd,
                        'RespPregRelacione' => $RespPregRelacione,

                    ]);
                }
            } else if ($TipPreg == "TALLER") {
                $PregTaller = EvalTaller::PregTaller($IdPreg);
                $RespPregTaller = RespEvalTaller::RespEvalTallerAlum($IdPreg, Auth::user()->id);
                if (request()->ajax()) {
                    return response()->json([
                        'PregTaller' => $PregTaller,
                        'RespPregTaller' => $RespPregTaller,
                    ]);
                }
            }

        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarRespEvaluaciones(){
        if (Auth::check()) {
            $datos = request()->all();

            $fecha = date('Y-m-d  H:i:s');
            $OriEva = [];
            if ($datos['TipPregunta'] == "PREGENSAY") {
                $InfPreg = EvalPregEnsay::consulPregEnsay($datos['Pregunta']);
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion']);
                $Respuesta = RespEvalEnsay::Guardar($InfPreg, $datos, $fecha);
                $InfEval->OriEva = "Estudiante";

            } else if ($datos['TipPregunta'] == "COMPLETE") {

                $InfPreg = EvalPregComplete::ConsultComplete($datos['Pregunta']);
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion']);
                $Respuesta = RespEvalComp::Guardar($InfPreg, $datos, $fecha);
                $InfEval->OriEva = "Estudiante";

            } else if ($datos['TipPregunta'] == "OPCMULT") {
                $Respuesta = RespMultPreg::Guardar($datos, $fecha);
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion']);
                $InfEval->OriEva = "Estudiante";
            } else if ($datos['TipPregunta'] == "VERFAL") {
                $Respuesta = RespVerFal::Guardar($datos, $fecha);
                
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion']);
                $InfEval->OriEva = "Estudiante";

            } else if ($datos['TipPregunta'] == "RELACIONE") {
                $Respuesta = RespEvalRelacione::Guardar($datos, $fecha);
               
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion']);
                $InfEval->OriEva = "Estudiante";

            } else if ($datos['TipPregunta'] == "TALLER") {

                if (request()->hasfile('archiTaller')) {
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $name = self::sanear_string($prefijo . '_' . request()->file('archiTaller')->getClientOriginalName());
                    request()->file('archiTaller')->move(public_path() . '/app-assets/Archivos_EvalTaller_Resp/', $name);
                } else {
                    $name = $datos['NArchivo'];
                }

                $InfPreg = EvalTaller::PregTaller($datos['Pregunta']);
                $Respuesta = RespEvalTaller::Guardar($InfPreg, $name, $fecha);
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion'], 'IFEVAL');
                $InfEval->OriEva = "Estudiante";

            }

            if ($datos['nPregunta'] === "Ultima") {
                $LibroCalif = LibroCalificaciones::Guardar($datos, $Respuesta['RegViejo'], $Respuesta['RegNuevo'], $InfEval, $fecha);
                $Intentos = UpdIntEval::Guardar($datos['IdEvaluacion']);
                $InfEval = Evaluacion::DatosEvla($datos['IdEvaluacion']);

                $Log = Log::Guardar('Evaluación Desarrollada', $datos['IdEvaluacion']);

                if ($Respuesta) {
                    if (request()->ajax()) {
                        return response()->json([
                            'Resp' => 'guardada',
                            'Libro' => $LibroCalif,
                            'InfEval' => $InfEval,
                        ]);
                    }
                }

            } else {
                $LibroCalif = LibroCalificaciones::Guardar($datos, $Respuesta['RegViejo'], $Respuesta['RegNuevo'], $InfEval, $fecha);
               
                if ($LibroCalif) {
                    if (request()->ajax()) {
                        return response()->json([
                            'Resp' => 'guardada',
                        ]);
                    }
                }
            }

        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }


    public function sanear_string($string)
    {
        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array(
                "¨", "º", "-", "~", "", "@", "|", "!",
                "·", "$", "%", "&", "/",
                "(", ")", "?", "'", " h¡",
                "¿", "[", "^", "<code>", "]",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":",
                " "
            ),
            '',
            $string
        );

        return $string;
    }
}
