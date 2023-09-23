<?php

namespace App\Http\Controllers;

use App\Models\UnidadesTematicas;
use App\Models\Tematicas;
use App\Models\Evaluacion;
use App\Models\EvalPregEnsay;
use App\Models\EvalPregComplete;
use App\Models\PregOpcMul;
use App\Models\OpcPregMul;
use App\Models\EvalVerFal;
use App\Models\PregRelacione;
use App\Models\EvalRelacione;
use App\Models\EvalRelacioneOpc;
use App\Models\EvalTaller;
use App\Models\EvalPregDidact;
use App\Models\CosEval;
use App\Models\Practicas;
use App\Models\PregPractica;
use App\Models\OpcPractica;
use App\Models\Log;
use App\Models\LibroCalificaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{

    public function GestionarGramatica($ori, $id)
    {
        if (Auth::check()) {
            $bandera = "";
            if ($ori == "unidades") {
                return view('Administracion.GestionUnidades', compact('bandera'));
            } else if ($ori == "temas") {
                return view('Administracion.GestionarTematica', compact('bandera'));
            } else if ($ori == "evaluaciones") {
                $detTemas = Tematicas::BuscarDetTema($id);
                $tema = $detTemas->titulo;
                $unidad = $detTemas->nombre;
                return view('Administracion.GestionEvaluaciones', compact('id', 'tema', 'unidad'));
            } else if ($ori == "practicas") {
                $detTemas = Tematicas::BuscarDetTema($id);
                $tema = $detTemas->titulo;
                $unidad = $detTemas->nombre;
                return view('Administracion.GestionarPracticas', compact('id', 'tema', 'unidad'));
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function CargarPractica()
    {
        if (Auth::check()) {
            $ideva = request()->get('ideva');

            $Evaluacion = Evaluacion::BusEval($ideva);

            ///////CONSULTAR PREGUNTA OPCION MULTIPLE COMPLE
            $PregMult = PregPractica::ConsulPregAll($ideva);
            $OpciMult = OpcPractica::ConsulGrupOpcPregAll($ideva);


            if (request()->ajax()) {
                return response()->json([
                    'Evaluacion' => $Evaluacion,
                    'PregMult' => $PregMult,
                    'OpciMult' => $OpciMult
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }


    public function GuardarPractFin()
    {
        if (Auth::check()) {
            $datos = request()->all();

            $idEval = "";
            $idEval = request()->get('Id_Eval');
            $ContEval = Practicas::ModifPractFin($datos, $idEval);

            if (request()->ajax()) {
                return response()->json([
                    'idEval' => $idEval,
                ]);
            }


            $Log = Log::Guardar('Practica Modificada', $idEval);
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarUnidad()
    {
        $data = request()->all();
        if ($data['accion'] == "agregar") {
            $respuesta = UnidadesTematicas::guardar($data);
        } else if ($data['accion'] == "editar") {
            $respuesta = UnidadesTematicas::editar($data);
        }
        if ($respuesta) {
            $estado = "ok";
        } else {
            $estado = "fail";
        }

        if (request()->ajax()) {
            return response()->json([
                'estado' => $estado,
            ]);
        }
    }

    public function GuardarTema()
    {
        $data = request()->all();

        if ($data['accion'] == "agregar") {
            $respuesta = Tematicas::guardar($data);
            if ($respuesta) {
                $data['id'] = $respuesta;

                if (request()->has('repeater-list')) {
                    $img = [];
                    $tipo = [];
                    $repeaterList = $data['repeater-list'];


                    foreach ($repeaterList as $archivoMultimedia) {
                        if (isset($archivoMultimedia['multimedia'])) {

                            $archivo = $archivoMultimedia['multimedia'];
                            $nombreOriginal = $archivo->getClientOriginalName();
                            $tipoMime = $archivo->getClientMimeType();
                            // Accede a otros atributos del archivo según sea necesario

                            // Realiza acciones con el archivo, como moverlo a una ubicación deseada
                            $prefijo = substr(md5(uniqid(rand())), 0, 6);
                            $nombreArchivo = self::sanear_string($prefijo . '_' . $nombreOriginal);
                            $archivo->move(public_path() . '/app-assets/contenidoMultimedia/tematicas/', $nombreArchivo);
                            $img[] = $nombreArchivo;
                            $tipo[] = $tipoMime;
                            // Aquí puedes trabajar con los datos del archivo, como almacenarlos en una base de datos
                            $data['img'] = $img;
                            $data['tipo'] = $tipo;
                        }
                    }
                }

                if (isset($data['img'])) {
                    $respuestaMult = Tematicas::guardarMultimediaTema($data);
                }

                if (request()->hasfile('ejemplos')) {
                    foreach (request()->file('ejemplos') as $file) {
                        $prefijo = substr(md5(uniqid(rand())), 0, 6);
                        $name = self::sanear_string($prefijo . '_' . $file->getClientOriginalName());
                        $file->move(public_path() . '/app-assets/contenidoMultimedia/audios/', $name);

                        $arch[] = $name;
                    }
                    $data['Audio'] = $arch;
                }

                if (isset($data['contEjemplo'])) {
                    $respuestaMult = Tematicas::guardarEjemplosTema($data);
                }
            }
        } else if ($data['accion'] == "editar") {
            $respuesta = Tematicas::editar($data);


            if (request()->has('repeater-list')) {
                $img = [];
                $tipo = [];
                $repeaterList = $data['repeater-list'];


                foreach ($repeaterList as $archivoMultimedia) {
                    if (isset($archivoMultimedia['multimedia'])) {

                        $archivo = $archivoMultimedia['multimedia'];
                        $nombreOriginal = $archivo->getClientOriginalName();
                        $tipoMime = $archivo->getClientMimeType();
                        // Accede a otros atributos del archivo según sea necesario

                        // Realiza acciones con el archivo, como moverlo a una ubicación deseada
                        $prefijo = substr(md5(uniqid(rand())), 0, 6);
                        $nombreArchivo = self::sanear_string($prefijo . '_' . $nombreOriginal);
                        $archivo->move(public_path() . '/app-assets/contenidoMultimedia/tematicas/', $nombreArchivo);
                        $img[] = $nombreArchivo;
                        $tipo[] = $tipoMime;
                        // Aquí puedes trabajar con los datos del archivo, como almacenarlos en una base de datos
                        $data['img'] = $img;
                        $data['tipo'] = $tipo;
                    }
                }
            }


            if (isset($data['img'])) {
                $respuestaMult = Tematicas::guardarMultimediaTema($data);
            }

            if (request()->hasfile('ejemplos')) {
                foreach (request()->file('ejemplos') as $file) {
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $name = self::sanear_string($prefijo . '_' . $file->getClientOriginalName());
                    $file->move(public_path() . '/app-assets/contenidoMultimedia/audios/', $name);
                    $archOr[] = $file->getClientOriginalName();
                    $arch[] = $name;
                }
                $data['AudioOr'] = $archOr;
                $data['Audio'] = $arch;
            }

            if (isset($data['contEjemplo'])) {
                $respuestaMult = Tematicas::guardarEjemplosTema($data);
            }
        }


        if ($respuesta) {
            $estado = "ok";
        } else {
            $estado = "fail";
        }

        if (request()->ajax()) {
            return response()->json([
                'estado' => $estado,
            ]);
        }
    }

    public function EliminarUnidad()
    {
        $idUndad = request()->get('idUnidad');
        $unidades = UnidadesTematicas::EliminarUnidad($idUndad);
    }
    public function EliminarTema()
    {
        $idUndad = request()->get('idTema');
        $unidades = Tematicas::EliminarTematica($idUndad);
    }

    public function eliminarMultimedia()
    {
        $idMult = request()->get('idmultimedia');
        $archivo = request()->get('rutaMultimedia');
        $Multmedia = Tematicas::EliminarRegistomultimedia($idMult);

        $fileToDelete = public_path() . '/app-assets/contenidoMultimedia/tematicas/' . $archivo; // Ruta completa al archivo que deseas eliminar

        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }


        if (request()->ajax()) {
            return response()->json([
                'estado' => "ok",
            ]);
        }
    }

    public function eliminarEjemplo()
    {
        $idEjemplo = request()->get('idejemplo');
        $rutaEjemplo = request()->get('rutaEjemplo');
        $Multmedia = Tematicas::EliminarEjemplo($idEjemplo);

        $fileToDelete = public_path() . '/app-assets/contenidoMultimedia/audios/' . $rutaEjemplo; // Ruta completa al archivo que deseas eliminar

        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }




        if (request()->ajax()) {
            return response()->json([
                'estado' => "ok",
            ]);
        }
    }

    public function CargarUnidades()
    {
        $perPage = 5; // Número de posts por página
        $page = request()->get('page', 1);
        $searchTerm = request()->get('search');
        if (!is_numeric($page)) {
            $page = 1; // Establecer un valor predeterminado si no es numérico
        }

        $unidades = DB::connection('mysql')
            ->table('etno_ped.unidades_tematicas')
            ->where('estado', 'ACTIVO');
        if ($searchTerm) {
            $unidades->where('nombre', 'LIKE', '%' . $searchTerm . '%');
        }
        $Listunidades = $unidades->paginate($perPage, ['*'], 'page', $page);

        $tdTable = '';
        $x = ($page - 1) * $perPage + 1;

        foreach ($Listunidades as $i => $item) {
            if (!is_null($item)) {
                $descripcionCortada = $item->descripcion ?
                    (strlen($item->descripcion) > 100 ? substr($item->descripcion, 0, 100) . '...' : $item->descripcion) :
                    "Sin descripción";

                $tdTable .= '<tr>' .
                    '<td><div class="btn-group" role="group" aria-label="First Group">' .
                    '    <button type="button" title="Editar" onclick="$.editar(' . $item->id . ');" class="btn btn-icon btn-pure primary "><i class="fa fa-edit"></i></button>' .
                    '    <button type="button" title="Eliminar" onclick="$.eliminar(' . $item->id . ');" class="btn btn-icon btn-pure danger "><i class="fa fa-trash-o"></i></button>' .
                    '    </div>' .
                    '</td>' .
                    '<th scope="row">' . $x . '</th>' .
                    '<td>' . $item->nombre . '</td>' .
                    '<td>' . $descripcionCortada . '</td>' .
                    '</tr>';

                $x++;
            }
        }

        $pagination = $Listunidades->links('Administracion.Paginacion')->render();

        return response()->json([
            'unidades' => $tdTable,
            'links' => $pagination,
        ]);
    }

    public function BuscarUnidad()
    {
        $idUndad = request()->get('idUnidad');
        $unidades = UnidadesTematicas::BuscarUnidad($idUndad);

        if (request()->ajax()) {
            return response()->json([
                'unidades' => $unidades,
            ]);
        }
    }

    public function BuscarTema()
    {
        $idTema = request()->get('idTema');
        $tematica = Tematicas::BuscarTema($idTema);
        $mulTematica = Tematicas::BuscarMultimedia($idTema);
        $ejemplos = Tematicas::BuscarEjemplos($idTema);

        if (request()->ajax()) {
            return response()->json([
                'tematica' => $tematica,
                'mulTematica' => $mulTematica,
                'ejemplos' => $ejemplos,
            ]);
        }
    }

    public function CargarUnidadesSelect()
    {

        $unidades = UnidadesTematicas::AllUnidades();

        if (request()->ajax()) {
            return response()->json([
                'unidades' => $unidades,
            ]);
        }
    }

    public function CargarTemas()
    {
        $perPage = 5; // Número de posts por página
        $page = request()->get('page', 1);
        $searchTerm = request()->get('search');
        if (!is_numeric($page)) {
            $page = 1; // Establecer un valor predeterminado si no es numérico
        }

        $temas = DB::connection('mysql')
            ->table('etno_ped.tematicas')
            ->leftJoin('etno_ped.unidades_tematicas', 'etno_ped.tematicas.unidad', '=', 'etno_ped.unidades_tematicas.id')
            ->select('etno_ped.tematicas.id', 'etno_ped.tematicas.titulo', 'etno_ped.unidades_tematicas.nombre AS unidad')
            ->where('etno_ped.tematicas.estado', 'ACTIVO');
        if ($searchTerm) {
            $temas->where('titulo', 'LIKE', '%' . $searchTerm . '%');
        }

        $ListTemas = $temas->paginate($perPage, ['*'], 'page', $page);

        $tdTable = '';
        $x = ($page - 1) * $perPage + 1;

        foreach ($ListTemas as $i => $item) {
            if (!is_null($item)) {
                $tdTable .= '<tr>' .
                    '<td><div class="btn-group" role="group" aria-label="First Group">' .
                    '    <button type="button" title="Editar" onclick="$.editar(' . $item->id . ');" class="btn btn-icon btn-pure primary "><i class="fa fa-edit"></i></button>' .
                    '    <button type="button" title="Eliminar" onclick="$.eliminar(' . $item->id . ');" class="btn btn-icon btn-pure danger "><i class="fa fa-trash-o"></i></button>' .
                    '<button title="Evaluaciones" type="button" onclick="$.evaluaciones(' . $item->id . ');" class="btn btn-icon btn-pure secondary  "><i class="fa fa-check-square-o"></i> </button>' .
                    '<button title="Practicas" type="button" onclick="$.practicas(' . $item->id . ');" class="btn btn-icon btn-pure warning  "><i class="fa fa-users"></i> </button>' .
                    '</div>' .
                    '</td>' .
                    '<th style="vertical-align: middle" scope="row">' . $x . '</th>' .
                    '<td style="vertical-align: middle">' . $item->titulo . '</td>' .
                    '<td style="vertical-align: middle">' . $item->unidad . '</td>' .
                    '</tr>';

                $x++;
            }
        }

        $pagination = $ListTemas->links('Administracion.Paginacion')->render();

        return response()->json([
            'temas' => $tdTable,
            'links' => $pagination,
        ]);
    }

    public function CargarEvaluaciones()
    {

        $idTema = request()->get('idTema');

        $perPage = 5; // Número de posts por página
        $page = request()->get('page', 1);
        $searchTerm = request()->get('search');
        if (!is_numeric($page)) {
            $page = 1; // Establecer un valor predeterminado si no es numérico
        }

        $evaluaciones = DB::connection('mysql')
            ->table('etno_ped.evaluaciones')
            ->where('estado', 'ACTIVO')
            ->where('tematica', $idTema);
        if ($searchTerm) {
            $evaluaciones->where('titulo', 'LIKE', '%' . $searchTerm . '%');
        }
        $ListEvaluaciones = $evaluaciones->paginate($perPage, ['*'], 'page', $page);

        $tdTable = '';
        $x = ($page - 1) * $perPage + 1;

        foreach ($ListEvaluaciones as $i => $item) {
            if (!is_null($item)) {
                $descripcionCortada = $item->titulo ?
                    (strlen($item->titulo) > 100 ? substr($item->titulo, 0, 100) . '...' : $item->titulo) :
                    "Sin descripción";

                $tdTable .= '<tr>' .
                    '<td><div class="btn-group" role="group" aria-label="First Group">' .
                    '    <button type="button" title="Editar" onclick="$.editar(' . $item->id . ');" class="btn btn-icon btn-pure primary "><i class="fa fa-edit"></i></button>' .
                    '    <button type="button" title="Eliminar" onclick="$.eliminar(' . $item->id . ');" class="btn btn-icon btn-pure danger "><i class="fa fa-trash-o"></i></button>';
                if (Auth::user()->tipo_usuario == "Profesor") {
                    $tdTable .=  '    <button type="button" title="Calificar Evaluación" onclick="$.Calificar(' . $item->id . ');" class="btn btn-icon btn-pure success "><i class="fa fa-check-square-o"></i></button>';
                }
                $tdTable .= '    </div>' .
                    '</td>' .
                    '<th scope="row">' . $x . '</th>' .
                    '<td>' . $descripcionCortada . '</td>' .
                    '</tr>';

                $x++;
            }
        }

        $pagination = $ListEvaluaciones->links('Administracion.Paginacion')->render();

        return response()->json([
            'unidades' => $tdTable,
            'links' => $pagination,
        ]);
    }
    public function CargarPracticas()
    {

        $idTema = request()->get('idTema');

        $perPage = 5; // Número de posts por página
        $page = request()->get('page', 1);
        $searchTerm = request()->get('search');
        if (!is_numeric($page)) {
            $page = 1; // Establecer un valor predeterminado si no es numérico
        }

        $practicas = DB::connection('mysql')
            ->table('etno_ped.practicas_tematica')
            ->where('estado', 'ACTIVO')
            ->where('tematica', $idTema);
        if ($searchTerm) {
            $practicas->where('titulo', 'LIKE', '%' . $searchTerm . '%');
        }
        $ListPracticas = $practicas->paginate($perPage, ['*'], 'page', $page);

        $tdTable = '';
        $x = ($page - 1) * $perPage + 1;

        foreach ($ListPracticas as $i => $item) {
            if (!is_null($item)) {
                $descripcionCortada = $item->titulo ?
                    (strlen($item->titulo) > 100 ? substr($item->titulo, 0, 100) . '...' : $item->titulo) :
                    "Sin descripción";

                $tdTable .= '<tr>' .
                    '<td><div class="btn-group" role="group" aria-label="First Group">' .
                    '    <button type="button" title="Editar" onclick="$.editar(' . $item->id . ');" class="btn btn-icon btn-pure primary "><i class="fa fa-edit"></i></button>' .
                    '    <button type="button" title="Eliminar" onclick="$.eliminar(' . $item->id . ');" class="btn btn-icon btn-pure danger "><i class="fa fa-trash-o"></i></button>';
                $tdTable .= '    </div>' .
                    '</td>' .
                    '<th scope="row">' . $x . '</th>' .
                    '<td>' . $descripcionCortada . '</td>' .
                    '</tr>';

                $x++;
            }
        }

        $pagination = $ListPracticas->links('Administracion.Paginacion')->render();

        return response()->json([
            'unidades' => $tdTable,
            'links' => $pagination,
        ]);
    }

    ///////////////////GUARDAR EVALUACIÓN
    public function guardarEvaluacion()
    {
        if (Auth::check()) {
            $datos = request()->all();

            $idEval = "";
            $calxdoc = "NO";

            if ($datos['Id_Eval'] === null) {
                $ContEval = Evaluacion::Guardar($datos, $calxdoc);
                $idEval = $ContEval;
            } else {
                $idEval = request()->get('Id_Eval');
                $ContEval = Evaluacion::ModifEval($datos, $idEval, $calxdoc);
            }

            if ($datos['Tipreguntas'] === "PREGENSAY") {
                if ($datos['id-pregensay'] === null) {
                    $ContPregEnsayo = EvalPregEnsay::Guardar($datos, $idEval);
                    $ContPregEnsayo = EvalPregEnsay::consulPregEnsay($ContPregEnsayo);
                    $ConsEval = CosEval::Guardar($datos, $idEval, $ContPregEnsayo->id);
                } else {
                    $ContPregEnsayo = EvalPregEnsay::ModifPreg($datos);
                    $ContPregEnsayo = EvalPregEnsay::consulPregEnsay($datos['id-pregensay']);
                }

                $ConsEval = CosEval::GrupPreg($idEval);
                foreach ($ConsEval as $Preg) {
                    if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                        $calxdoc = "SI";
                    }
                }
                $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);
                $Log = Log::Guardar('Evaluación Modificada', $idEval);

                if (request()->ajax()) {
                    return response()->json([
                        'idEval' => $idEval,
                        'ContPregEnsayo' => $ContPregEnsayo,
                    ]);
                }
            } else if ($datos['Tipreguntas'] === "COMPLETE") {
                $datos['cb_Opciones'] = implode(',', $datos['cb_Opciones']);
                if ($datos['id-pregcomplete'] === null) {
                    $ContPreComplete = EvalPregComplete::Guardar($datos, $idEval);
                    $ContPreComplete = EvalPregComplete::ConsultComplete($ContPreComplete);
                    $ConsEval = CosEval::Guardar($datos, $idEval, $ContPreComplete->id);
                } else {
                    $ContPreComplete = EvalPregComplete::Modificar($datos);
                    $ContPreComplete = EvalPregComplete::ConsultComplete($datos['id-pregcomplete']);
                }

                $ConsEval = CosEval::GrupPreg($idEval);
                foreach ($ConsEval as $Preg) {
                    if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                        $calxdoc = "SI";
                    }
                }

                $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);
                $Log = Log::Guardar('Evaluación Modificada', $idEval);

                if (request()->ajax()) {
                    return response()->json([
                        'idEval' => $idEval,
                        'ContPreComplete' => $ContPreComplete,
                    ]);
                }
            } else if ($datos['Tipreguntas'] === "OPCMULT") {
                if ($datos['IdpreguntaMul'] === null) {
                    $PregOpcMul = PregOpcMul::Guardar($datos['PreMulResp'], $datos['puntaje'], $idEval);
                    $PregOpcMul = PregOpcMul::ConsulPreg($PregOpcMul);

                    if ($PregOpcMul) {
                        $ConsEval = CosEval::Guardar($datos, $idEval, $PregOpcMul->id);
                        $OpciPregMul = OpcPregMul::Guardar($datos, $PregOpcMul->id, $idEval);
                        $OpciPregMul = OpcPregMul::ConsulGrupOpc($PregOpcMul->id, $idEval);
                    }
                } else {
                    $PregOpcMul = PregOpcMul::ModiPreMul($datos['PreMulResp'], $datos['puntaje'], $datos['IdpreguntaMul'], $idEval);
                    $PregOpcMul = PregOpcMul::ConsulPreg($datos['IdpreguntaMul']);
                    if ($PregOpcMul) {
                        $OpciPregMul = OpcPregMul::ModOpcPreg($datos, $idEval);
                        $OpciPregMul = OpcPregMul::ConsulGrupOpc($datos['IdpreguntaMul'], $idEval);
                    }
                }
                $ConsEval = CosEval::GrupPreg($idEval);

                foreach ($ConsEval as $Preg) {
                    if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                        $calxdoc = "SI";
                    }
                }



                $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);
                $Log = Log::Guardar('Evaluación Modificada', $idEval);

                if (request()->ajax()) {
                    return response()->json([
                        'idEval' => $idEval,
                        'PregOpcMul' => $PregOpcMul,
                        'OpciPregMul' => $OpciPregMul,
                    ]);
                }
            } else if ($datos['Tipreguntas'] === "VERFAL") {
                if ($datos['id-pregverfal'] === null) {
                    $ContPregVerFal = EvalVerFal::Guardar($datos, $idEval);
                    $ContPregVerFal = EvalVerFal::ConVerFal($ContPregVerFal);
                    $ConsEval = CosEval::Guardar($datos, $idEval, $ContPregVerFal->id);
                } else {
                    $ContPregVerFal = EvalVerFal::ModifPreg($datos);
                    $ContPregVerFal = EvalVerFal::ConVerFal($datos['id-pregverfal']);
                }

                $ConsEval = CosEval::GrupPreg($idEval);
                foreach ($ConsEval as $Preg) {
                    if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                        $calxdoc = "SI";
                    }
                }

                $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);
                $Log = Log::Guardar('Evaluación Modificada', $idEval);

                if (request()->ajax()) {
                    return response()->json([
                        'idEval' => $idEval,
                        'ContPregVerFal' => $ContPregVerFal,
                    ]);
                }
            } else if ($datos['Tipreguntas'] === "RELACIONE") {
                if ($datos['id-relacione'] === null) {
                    $PregRel = PregRelacione::Guardar($datos, $idEval);
                    $PregRel = PregRelacione::ConRela($PregRel);
                    $ConsEval = CosEval::Guardar($datos, $idEval, $PregRel->id);

                    $ContIndicaciones = EvalRelacione::Guardar($datos, $PregRel->id, $idEval);
                    $ContPregRespuest = EvalRelacioneOpc::Guardar($datos, $PregRel->id, $idEval);
                    $PregRelIndi = EvalRelacione::PregRelDef($PregRel->id);
                    $PregRelResp = EvalRelacioneOpc::PregRelOpc($PregRel->id);
                } else {

                    $PregRel = PregRelacione::Modificar($datos);
                    $ContIndicaciones = EvalRelacione::Modificar($datos, $datos['id-relacione'], $idEval);
                    $ContPregRespuest = EvalRelacioneOpc::Modificar($datos, $datos['id-relacione'], $idEval);

                    $PregRel = PregRelacione::ConRela($datos['id-relacione']);

                    $PregRelIndi = EvalRelacione::PregRelDef($datos['id-relacione']);
                    $PregRelResp = EvalRelacioneOpc::PregRelOpc($datos['id-relacione']);
                }

                $ConsEval = CosEval::GrupPreg($idEval);
                foreach ($ConsEval as $Preg) {
                    if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                        $calxdoc = "SI";
                    }
                }

                $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);
                $Log = Log::Guardar('Evaluación Modificada', $idEval);

                if (request()->ajax()) {
                    return response()->json([
                        'idEval' => $idEval,
                        'PregRel' => $PregRel,
                        'PregRelIndi' => $PregRelIndi,
                        'PregRelResp' => $PregRelResp,
                    ]);
                }
            } else if ($datos['Tipreguntas'] === "TALLER") {
                if (request()->hasfile('archiTaller')) {
                    $prefijo = substr(md5(uniqid(rand())), 0, 6);
                    $name = self::sanear_string($prefijo . '_' . request()->file('archiTaller')->getClientOriginalName());
                    request()->file('archiTaller')->move(public_path() . '/app-assets/Archivos_EvaluacionTaller/', $name);
                }
                $datos['archivo'] = $name;
                if ($datos['id-taller'] === null) {
                    $ContPregTaller = EvalTaller::GuardarTallerArc($datos, $idEval);
                    $ContPregTaller = EvalTaller::PregTaller($ContPregTaller);
                    $ConsEval = CosEval::Guardar($datos, $idEval, $ContPregTaller->id);
                } else {
                    $ContPregEnsayo = EvalTaller::ModifPreg($datos);
                    $ContPregTaller = EvalTaller::PregTaller($datos['id-taller']);
                }

                $ConsEval = CosEval::GrupPreg($idEval);
                foreach ($ConsEval as $Preg) {
                    if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                        $calxdoc = "SI";
                    }
                }

                $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);
                $Log = Log::Guardar('Evaluación Modificada', $idEval);

                if (request()->ajax()) {
                    return response()->json([
                        'idEval' => $idEval,
                        'ContPregTaller' => $ContPregTaller,
                    ]);
                }
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    ///////////////////GUARDAR PRACTICA
    public function guardarPractica()
    {
        if (Auth::check()) {
            $datos = request()->all();

            $idEval = "";

            if ($datos['Id_Eval'] === null) {
                $ContEval = Practicas::Guardar($datos);
                $idEval = $ContEval;
            } else {
                $idEval = request()->get('Id_Eval');
                $ContEval = Practicas::ModifEval($datos, $idEval);
            }

            if ($datos['IdpreguntaMul'] === null) {
                $PregOpcMul = PregPractica::Guardar($datos['PreMulResp'],  $idEval);
                $PregOpcMul = PregPractica::ConsulPreg($PregOpcMul);

                if ($PregOpcMul) {
                    $OpciPregMul = OpcPractica::Guardar($datos, $PregOpcMul->id, $idEval);
                    $OpciPregMul = OpcPractica::ConsulGrupOpc($PregOpcMul->id, $idEval);
                }
            } else {
                $PregOpcMul = PregPractica::ModiPreMul($datos['PreMulResp'],  $datos['IdpreguntaMul'], $idEval);
                $PregOpcMul = PregPractica::ConsulPreg($datos['IdpreguntaMul']);
                if ($PregOpcMul) {
                    $OpciPregMul = OpcPractica::ModOpcPreg($datos, $idEval);
                    $OpciPregMul = OpcPractica::ConsulGrupOpc($datos['IdpreguntaMul'], $idEval);
                }
            }


            $Log = Log::Guardar('Practica Modificada', $idEval);

            if (request()->ajax()) {
                return response()->json([
                    'idEval' => $idEval,
                    'PregOpcMul' => $PregOpcMul,
                    'OpciPregMul' => $OpciPregMul,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function consulPractPreg()
    {
        $IdPreg = request()->get('Pregunta');

        if (Auth::check()) {

            $PregMult = PregPractica::ConsulPreg($IdPreg);
            $OpciMult = OpcPractica::ConsulGrupOpcPreg($IdPreg);
            if (request()->ajax()) {
                return response()->json([
                    'PregMult' => $PregMult,
                    'OpciMult' => $OpciMult,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    ///CONSULTAR PREGUNTAS EVALUACION
    public function consulEvalPreg()
    {
        $IdPreg = request()->get('Pregunta');
        $TipPreg = request()->get('TipPregunta');

        if (Auth::check()) {
            if ($TipPreg == "PREGENSAY") {
                $PregEnsayo = EvalPregEnsay::consulPregEnsay($IdPreg);
                if (request()->ajax()) {
                    return response()->json([
                        'PregEnsayo' => $PregEnsayo,
                    ]);
                }
            } else if ($TipPreg == "COMPLETE") {
                $PregComple = EvalPregComplete::ConsultComplete($IdPreg);
                if (request()->ajax()) {
                    return response()->json([
                        'PregComple' => $PregComple,
                    ]);
                }
            } else if ($TipPreg == "OPCMULT") {
                $PregMult = PregOpcMul::ConsulPreg($IdPreg);
                $OpciMult = OpcPregMul::ConsulGrupOpcPreg($IdPreg);
                if (request()->ajax()) {
                    return response()->json([
                        'PregMult' => $PregMult,
                        'OpciMult' => $OpciMult,
                    ]);
                }
            } else if ($TipPreg == "VERFAL") {
                $PregVerFal = EvalVerFal::ConVerFal($IdPreg);
                if (request()->ajax()) {
                    return response()->json([
                        'PregVerFal' => $PregVerFal,
                    ]);
                }
            } else if ($TipPreg == "RELACIONE") {
                $PregRelacione = PregRelacione::ConRela($IdPreg);
                $PregRelIndi = EvalRelacione::PregRelDef($IdPreg);
                $PregRelResp = EvalRelacioneOpc::PregRelOpc($IdPreg);
                $PregRelRespAdd = EvalRelacioneOpc::PregRelOpcAdd($IdPreg);

                if (request()->ajax()) {
                    return response()->json([
                        'PregRelacione' => $PregRelacione,
                        'PregRelIndi' => $PregRelIndi,
                        'PregRelResp' => $PregRelResp,
                        'PregRelRespAdd' => $PregRelRespAdd,

                    ]);
                }
            } else if ($TipPreg == "TALLER") {
                $PregTaller = EvalTaller::PregTaller($IdPreg);
                if (request()->ajax()) {
                    return response()->json([
                        'PregTaller' => $PregTaller,
                    ]);
                }
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function GuardarEvalFin()
    {
        if (Auth::check()) {
            $datos = request()->all();

            $idEval = "";
            $idEval = request()->get('Id_Eval');
            $ContEval = Evaluacion::ModifEvalFin($datos, $idEval);


            if (request()->ajax()) {
                return response()->json([
                    'idEval' => $idEval,
                ]);
            }


            $Log = Log::Guardar('Evaluación Modificada', $idEval);
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function EliminarEvaluacion()
    {
        $opc = "NT";
        $mensaje = "";
        $icon = "";
        if (Auth::check()) {
            $id = request()->get('idEval');
            $Verf = Evaluacion::VerfDel($id);

            if ($Verf->count() > 0) {
                $estado = "SINPERMISO";
                $mensaje = 'Esta Evaluación es Propia de la Plataforma,  No puede ser Eliminada...';
                $icon = 'warning';
                $opc = "VU";
            } else {
                $Elib = LibroCalificaciones::BusEvalDel($id);
                if ($Elib) {
                    $estado = "ACTIVO";
                    $mensaje = 'La Evaluación no puede ser Eliminada, ya que ha sido resuelta por un Estudiante';
                    $icon = 'warning';
                    $opc = "VU";
                } else {
                    $estado = "ELIMINADO";
                    $respuesta = Evaluacion::editarestado($id, $estado);
                    if ($respuesta) {
                        if ($estado == "ELIMINADO") {
                            $Log = Log::Guardar('Evaluación Eliminada', $id);
                            $mensaje = 'Operación Realizada de Manera Exitosa';
                            $icon = 'success';
                        }
                    } else {
                        $mensaje = 'La Operación no pudo ser Realizada';
                    }
                }
            }
            if (request()->ajax()) {
                return response()->json([
                    'estado' => $estado,
                    'mensaje' => $mensaje,
                    'id' => $id,
                    'opc' => $opc,
                    'icon' => $icon,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }
    public function EliminarPractica()
    {
        $opc = "NT";
        $mensaje = "";
        $icon = "";
        if (Auth::check()) {
            $id = request()->get('idEval');
            $Verf = Practicas::VerfDel($id);

            if ($Verf->count() > 0) {
                $estado = "SINPERMISO";
                $mensaje = 'Esta Evaluación es Propia de la Plataforma,  No puede ser Eliminada...';
                $icon = 'warning';
                $opc = "VU";
            } else {
                    $estado = "ELIMINADO";
                    $respuesta = Practicas::editarestado($id, $estado);
                    if ($respuesta) {
                        if ($estado == "ELIMINADO") {
                            $Log = Log::Guardar('Practica Eliminada', $id);
                            $mensaje = 'Operación Realizada de Manera Exitosa';
                            $icon = 'success';
                        }
                    } else {
                        $mensaje = 'La Operación no pudo ser Realizada';
                    }
               
            }
            if (request()->ajax()) {
                return response()->json([
                    'estado' => $estado,
                    'mensaje' => $mensaje,
                    'id' => $id,
                    'opc' => $opc,
                    'icon' => $icon,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function CargarEvaluacion()
    {
        if (Auth::check()) {
            $ideva = request()->get('ideva');

            $Evaluacion = Evaluacion::BusEval($ideva);

            $PregEval = CosEval::GrupPreg($ideva);
            /////CONUSLTAR PREGUNTA ENSAYO
            $PregEnsayo = EvalPregEnsay::consulPregEnsayAll($ideva);

            ///////CONSULTAR PREGUNTA COMPLETE
            $PregComple = EvalPregComplete::ConsultCompleteAll($ideva);

            ///////CONSULTAR PREGUNTA OPCION MULTIPLE COMPLE
            $PregMult = PregOpcMul::ConsulPregAll($ideva);
            $OpciMult = OpcPregMul::ConsulGrupOpcPregAll($ideva);

            ///////CONSULTAR PREGUNTA VERDADERO Y FALSO
            $PregVerFal = EvalVerFal::VerFal($ideva);

            ///////CONSULTAR PREGUNTA RELACIONE
            $PregRelacione = PregRelacione::ConRelaAll($ideva);
            $PregRelIndi = EvalRelacione::PregRelDefAll($ideva);
            $PregRelResp = EvalRelacioneOpc::PregRelOpcAll($ideva);
            $PregRelRespAdd = EvalRelacioneOpc::PregRelOpcaddAll($ideva);

            /////////CONSULTAR TALLER
            $PregTaller = EvalTaller::PregTallerAll($ideva);


            if (request()->ajax()) {
                return response()->json([
                    'Evaluacion' => $Evaluacion,
                    'PregEval' => $PregEval,
                    'PregEnsayo' => $PregEnsayo,
                    'PregComple' => $PregComple,
                    'PregMult' => $PregMult,
                    'OpciMult' => $OpciMult,
                    'PregVerFal' => $PregVerFal,
                    'PregRelacione' => $PregRelacione,
                    'PregRelIndi' => $PregRelIndi,
                    'PregRelResp' => $PregRelResp,
                    'PregRelRespAdd' => $PregRelRespAdd,
                    'PregTaller' => $PregTaller,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function VideoEval()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $datos['animacion'] = "SI";

            $idEval = "";
            $calxdoc = "NO";
            if ($datos['Id_Eval'] === null) {
                $ContEval = Evaluacion::Guardar($datos, $calxdoc);
                $idEval = $ContEval;
            } else {
                $idEval = request()->get('Id_Eval');
                $ContEval = Evaluacion::ModifEval($datos, $idEval, $calxdoc);
            }

            $ConsEval = CosEval::GrupPreg($idEval);

            foreach ($ConsEval as $Preg) {
                if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {
                    $calxdoc = "SI";
                }
            }
            $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);

            if (request()->hasfile('archiVideo')) {
                $prefijo = substr(md5(uniqid(rand())), 0, 6);
                $name = self::sanear_string($prefijo . '_' . request()->file('archiVideo')->getClientOriginalName());
                request()->file('archiVideo')->move(public_path() . '/app-assets/Evaluacion_PregDidact/', $name);
                $datos['archivo'] = $name;
                if ($datos['id-video'] === null) {
                    $EvPDidact = EvalPregDidact::Guardar($datos, $idEval);
                    $EvPDidact = EvalPregDidact::PregDida($EvPDidact);
                } else {
                    $EvPDidact = EvalPregDidact::Modificar($datos, $idEval);
                    $EvPDidact = EvalPregDidact::PregDida($idEval);
                }
            }

            if (request()->ajax()) {
                return response()->json([
                    'idEval' => $idEval,
                    'EvPDidact' => $EvPDidact,
                ]);
            }
        }
    }

    public function ElimnarPreg()
    {
        $mensaje = "";
        $id = request()->get('id');
        $tip = request()->get('tip');
        $idEval = request()->get('ideval');
        if (Auth::check()) {

            if ($tip == "PREGENSAY") {
                $respuesta = EvalPregEnsay::DelPreg($id);
                $delcons = CosEval::DelPreg($id);
            } else if ($tip == "COMPLETE") {
                $respuesta = EvalPregComplete::DelPreg($id);
                $delcons = CosEval::DelPreg($id);
            } else if ($tip == "OPCMULT") {
                $respuesta = PregOpcMul::DelPregunta((int) $id);
                $respuesta = OpcPregMul::DelOpciones($id);
                $delcons = CosEval::DelPreg($id);
            } else if ($tip == "VERFAL") {
                $respuesta = EvalVerFal::DelPreg($id);
                $delcons = CosEval::DelPreg($id);
            } else if ($tip == "RELACIONE") {
                $respuesta = PregRelacione::DelPreg((int) $id);
                $respuesta = EvalRelacione::DelPreg($id);
                $respuesta = EvalRelacioneOpc::DelPreg($id);
                $delcons = CosEval::DelPreg($id);
            } else if ($tip == "TALLER") {
                $respuesta = EvalTaller::EliminarArch($id);
                $delcons = CosEval::DelPreg($id);
            }

            $calxdoc = "NO";

            $ConsEval = CosEval::GrupPreg($idEval);

            foreach ($ConsEval as $Preg) {

                if ($Preg->tipo == "PREGENSAY" || $Preg->tipo == "COMPLETE" || $Preg->tipo == "TALLER") {

                    $calxdoc = "SI";
                }
            }

            $ModCalxdoc = Evaluacion::ModifEvalCalxDoc($idEval, $calxdoc);

            if ($respuesta) {
                $Log = Log::Guardar('Pregunta Eliminada', $id);
                $mensaje = 'Operación Realizada de Manera Exitosa';
            } else {
                $mensaje = 'La Operación no pudo ser Realizada';
            }
            if (request()->ajax()) {
                return response()->json([
                    'mensaje' => $mensaje,
                    'id' => $id,
                ]);
            }
        } else {
            return redirect("/")->with("error", "Su Sesión ha Terminado");
        }
    }

    public function EliminarPregPract()
    {
        $mensaje = "";
        $id = request()->get('id');
        if (Auth::check()) {
            $respuesta = PregPractica::DelPregunta((int) $id);
            $respuesta = OpcPractica::DelOpciones($id);
            if ($respuesta) {
                $Log = Log::Guardar('Pregunta Practica Eliminada', $id);
                $mensaje = 'Operación Realizada de Manera Exitosa';
            } else {
                $mensaje = 'La Operación no pudo ser Realizada';
            }
            if (request()->ajax()) {
                return response()->json([
                    'mensaje' => $mensaje,
                    'id' => $id,
                ]);
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
