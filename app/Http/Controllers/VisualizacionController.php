<?php

namespace App\Http\Controllers;

use App\Models\CosEval;
use App\Models\Diccionario;
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
use App\Models\UnidadesTematicas;
use App\Models\Tematicas;
use App\Models\Alumnos;
use App\Models\Personajes;
use App\Models\UsosCostumbres;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Session;

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
            } else if ($dest == "Juegos") {
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

    public function Juegos($Alum)
    {
        if (Auth::check()) {
            Session::put('ZonaJuegoAct', 'si');
            return view('Visualizacion.Juegos');
        } else {
            return redirect("/");
        }
    }

    public function Calificaciones()
    {
        if (Auth::check()) {
            $bandera = "";
            return view('Visualizacion.Calificaciones', compact('bandera'));
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }


    public function CargarCalificaciones()
    {

        $calificaciones = DB::connection("mysql")->select("SELECT eval.id, CASE WHEN origen='GestionarMedicinaTradicional' 
        THEN 'Medicina tradicional' WHEN origen= 'GestionarUsosCostumbres'
        THEN 'Usos y constumbres' ELSE 'Gramatica y lenguaje' END origen,
        eval.titulo, eval.calif_usando, eval.punt_max, lc.calificacion, 
        lc.puntuacion, lc.calf_prof
        FROM etno_ped.libro_calificaciones lc
        LEFT JOIN etno_ped.evaluaciones eval ON lc.evaluacion= eval.id
        WHERE lc.alumno=" . Auth::user()->id);

        $tdTable = '';
        $x = 1;
        foreach ($calificaciones as $i => $item) {
            if (!is_null($item)) {
                $color = '';
                $Calificacion = "";
                $porcentaje = ($item->puntuacion / $item->punt_max) * 100;

                if ($porcentaje <= 50) {
                    $color = '#f20d00';
                } else if (
                    $porcentaje > 50 && $porcentaje <=
                    60
                ) {
                    $color = '#F08D0E';
                } else if (
                    $porcentaje > 60 && $porcentaje <=
                    70
                ) {
                    $color = '#F5DA00';
                } else if (
                    $porcentaje > 70 && $porcentaje <=
                    80
                ) {
                    $color = '#C0EA1C';
                } else if (
                    $porcentaje > 80 && $porcentaje <=
                    100
                ) {
                    $color = '#1ECD60';
                }

                $colorFont = '#fff';
                if ($item->calf_prof == "si") {
                    $Calificacion =  $item->calificacion;
                } else {
                    $Calificacion =  "Por calificar";
                    $color = '#fff';
                    $colorFont = '#404e67';
                }

                $tdTable .= '<tr>
                <td class="text-truncate">' . $x . '</td>
                <td class="text-truncate">' . $item->origen . '</td>
                <td class="text-truncate" style="text-transform: capitalize;">' . $item->titulo . '</td>
                <td class="text-truncate text-center"
                <a><span class="badge badge-success" style="color: ' . $colorFont . '; background-color: ' . $color . '">' . $Calificacion . '</span></a></td>
                </tr>';
                $x++;
            }
        }

        return response()->json([
            'calificaciones' => $tdTable
        ]);
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

            $Practica = Practicas::Practica($idPractica);

            $datPerso1 = Personajes::BusPersonaje($Practica->actor1);
            $datPerso2 = Personajes::BusPersonaje($Practica->actor2);


            $PregPractica = PregPractica::ConsulPregAll($idPractica);
            $OpcPractica = OpcPractica::ConsulGrupOpcPregAll($idPractica);

            if (request()->ajax()) {
                return response()->json([
                    'PregPractica' => $PregPractica,
                    'OpcPractica' => $OpcPractica,
                    'actor1' => $datPerso1->img,
                    'actor2' => $datPerso2->img
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

            $evaluaciones = Evaluacion::BusEvalOrigen($idMedicina, 'GestionarMedicinaTradicional');



            if (request()->ajax()) {
                return response()->json([
                    'Medicina' => $Medicina,
                    'evaluaciones' => $evaluaciones
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    public function CargarDetpalabra()
    {
        if (Auth::check()) {
            $idPalabra = request()->get('idPalabra');

            $detPalabra = Diccionario::BuscarPalabra($idPalabra);

            if (request()->ajax()) {
                return response()->json([
                    'detPalabra' => $detPalabra
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
     
            $evaluaciones = Evaluacion::BusEvalOrigen($idUso, 'GestionarUsosCostumbres');
      
            if (request()->ajax()) {
                return response()->json([
                    'detUsos' => $detUsos,
                    'evaluaciones' => $evaluaciones
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
            if (Auth::user()->tipo_usuario == "Estudiante") {
                $TemasEvaluacion = Evaluacion::allEvaluacionEst($idTema);
            } else {
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

    public function CargarDetEvaluacion()
    {
        if (Auth::check()) {
            $idEvaluacion = request()->get('idEvaluacion');
            $DesEva = Evaluacion::BusEval($idEvaluacion);

            $DatEva = Evaluacion::DatosEvla($DesEva->id);

            if (Auth::user()->tipo_usuario != "Estudiante") {
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

    public function CargarPreguntaEvaluacion()
    {

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

    public function GuardarRespEvaluaciones()
    {
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

    public function CargarPalabraDicc()
    {
        if (Auth::check()) {
            $perPage = 5; // Número de posts por página
            $page = request()->get('page', 1);
            $searchTerm = request()->get('search');
            if (!is_numeric($page)) {
                $page = 1; // Establecer un valor predeterminado si no es numérico
            }

            $searchTerm = self::convertirCaracteresEspeciales($searchTerm);

            $palabras = DB::connection('mysql')
                ->table('etno_ped.diccionario')
                ->where('estado', 'ACTIVO');


            $palabras->where(function ($query) use ($searchTerm) {
                $query->where('palabra_espanol', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('palabra_wuayuunaiki', 'LIKE', '%' . $searchTerm . '%');
            });

            $palabras = $palabras->orderByRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(palabra_espanol, '<p>', -1), '</p>', 1)");

            $Listpalabras = $palabras->paginate($perPage, ['*'], 'page', $page);

            $div_palabra = '';
            $x = ($page - 1) * $perPage + 1;

            foreach ($Listpalabras as $i => $item) {
                if (!is_null($item)) {

                    if ($item->definicion !== null) {
                        $crawlerDef = new Crawler($item->definicion);
                    } else {
                        // Si $item->definicion es null, reemplazarlo con una etiqueta HTML predeterminada
                        $item->definicion = "<p>No hay definición disponible</p>";
                        $crawlerDef = new Crawler($item->definicion);
                    }
                    $textoDef = $crawlerDef->filter('p')->text();

                    $definicion = $textoDef ?
                        (strlen($textoDef) > 100 ? substr($textoDef, 0, 100) . '...' : $textoDef) :
                        "Sin definición";

                    if ($item->imagen != "") {
                        $imagen = $item->imagen;
                    } else {
                        $imagen = "noIMg.png";
                    }

                    $crawlerEsp = new Crawler($item->palabra_espanol);
                    $textoEsp = $crawlerEsp->filter('p')->text();
                    $crawlerWayu = new Crawler($item->palabra_wuayuunaiki);
                    $textoWayu = $crawlerWayu->filter('p')->text();
                    if ($item->palabra_lectura !== null) {
                        $crawlerPron = new Crawler($item->palabra_lectura);
                    } else {
                        $item->palabra_lectura = "<p></p>";
                        $crawlerPron = new Crawler($item->palabra_lectura);
                    }

                    $prononciacion = $crawlerPron->filter('p')->text();

                    if ($item->ejemplo != "") {
                        $display = "block;";
                    } else {
                        $display = "none;";
                    }

                    if($imagen == "noIMg.png") {   
                        $opacity = "0.5";
                    }else{
                        $opacity = "1";
                    }

                    $div_palabra .= ' <ul class="media-list p-0 border-blue" style="cursor: pointer;" >
                    <li class="media row justify-content-center align-items-center" style="padding: 1rem !important;" >
                    <div class="col-2 media-left" style="display: contents !important">
                        <a href="#">
                            <img class="media-object width-100" style="opacity: '.$opacity.';" src="' . asset('app-assets/contenidoMultimedia/imgDiccionario/' . $imagen) . '" alt="Generic placeholder image">
                        </a>
                    </div>
                    <div class="media-body media-search col-10" >
                        <p style="font-size:20px; text-transform: capitalize;" class="lead mb-0"><a href="#"><span class="text-bold-700" style="font-size:20px;">' . $textoEsp . '</span></a></p>';

                    if ($item->audio != "") {
                        $div_palabra .= '<audio  class="audioEjemplo" id="audioEjemplo' . $x . '" style="max-width:40% !important;" controls>
                    <source src="' . asset('app-assets/contenidoMultimedia/audioDiccionario/' . $item->audio) . '" type="audio/mp3" />
                    <source src="' . asset('app-assets/contenidoMultimedia/audioDiccionario/' . $item->audio) . '" type="audio/ogg" />
                   </audio>';
                    }

                    $div_palabra .= '<p style="margin-bottom: 0px;font-size: 14px;text-transform: capitalize;"><span class="text-bold-600"><i class="fa fa-refresh"></i> En Wayuunaiki: </span> ' . $textoWayu  . '</p>';
                    if ($prononciacion != "") {
                        $div_palabra .= '<p style="margin-bottom: 0px;font-size: 14px;text-transform: capitalize;"><span class="text-bold-600"><i class="fa fa-commenting-o"></i> Pronunciación: </span> ' . $prononciacion . '</p>';
                    }

                    $div_palabra .= '<p></p><code style="display: ' . $display . '; background-color: transparent;" class="highlighter-rouge" onclick="$.abrirEjemplo(' . $x . ')"> - Ejemplo</code></p>';

                    $div_palabra .= '</div>
                        <div id="contEjemplo' . $x . '" style="display:none; ">' . $item->ejemplo . '</div>
                </li>
                </ul>';

                    $x++;
                }
            }

            $pagination = $Listpalabras->links('Administracion.Paginacion')->render();

            return response()->json([
                'palabras' => $div_palabra,
                'links' => $pagination,
            ]);
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }


    function convertirCaracteresEspeciales($term)
    {
        // Array de caracteres especiales y sus representaciones HTML
        $caracteres_especiales = array(
            'á' => '&aacute;',
            'à' => '&agrave;',
            'â' => '&acirc;',
            'ä' => '&auml;',
            'ã' => '&atilde;',
            'ç' => '&ccedil;',
            'é' => '&eacute;',
            'è' => '&egrave;',
            'ê' => '&ecirc;',
            'ë' => '&euml;',
            'í' => '&iacute;',
            'ì' => '&igrave;',
            'î' => '&icirc;',
            'ï' => '&iuml;',
            'ñ' => '&ntilde;',
            'ó' => '&oacute;',
            'ò' => '&ograve;',
            'ô' => '&ocirc;',
            'ö' => '&ouml;',
            'õ' => '&otilde;',
            'ú' => '&uacute;',
            'ù' => '&ugrave;',
            'û' => '&ucirc;',
            'ü' => '&uuml;',
            'ý' => '&yacute;',
            'ÿ' => '&yuml;',
            'Á' => '&Aacute;',
            'À' => '&Agrave;',
            'Â' => '&Acirc;',
            'Ä' => '&Auml;',
            'Ã' => '&Atilde;',
            'Ç' => '&Ccedil;',
            'É' => '&Eacute;',
            'È' => '&Egrave;',
            'Ê' => '&Ecirc;',
            'Ë' => '&Euml;',
            'Í' => '&Iacute;',
            'Ì' => '&Igrave;',
            'Î' => '&Icirc;',
            'Ï' => '&Iuml;',
            'Ñ' => '&Ntilde;',
            'Ó' => '&Oacute;',
            'Ò' => '&Ograve;',
            'Ô' => '&Ocirc;',
            'Ö' => '&Ouml;',
            'Õ' => '&Otilde;',
            'Ú' => '&Uacute;',
            'Ù' => '&Ugrave;',
            'Û' => '&Ucirc;',
            'Ü' => '&Uuml;',
            'Ý' => '&Yacute;',
            'Ÿ' => '&Yuml;',
            '¿' => '&iquest;',
            '"' => '&quot;',
            '\'' => '&#039;',
            '<' => '&lt;',
            '>' => '&gt;',
            '›' => '&rsaquo;',

            // Agrega más caracteres especiales y sus representaciones HTML aquí según sea necesario
        );

        // Reemplazar los caracteres especiales en el término de búsqueda
        foreach ($caracteres_especiales as $caracter => $html) {
            $term = str_replace($caracter, $html, $term);
        }

        return $term;
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
