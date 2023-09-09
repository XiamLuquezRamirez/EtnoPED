<?php

namespace App\Http\Controllers;

use App\Models\UnidadesTematicas;
use App\Models\Tematicas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{

    public function GestionarGramatica($ori)
    {
        if (Auth::check()) {
            $bandera = "";
            if ($ori == "unidades") {
                return view('Administracion.GestionUnidades', compact('bandera'));
            } else if ($ori == "temas") {
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
            if($respuesta){
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

        

            if(isset($data['img'])){
                $respuestaMult = Tematicas::guardarMultimediaTema($data);
            }
        }

       
        } else if ($data['accion'] == "editar") {
            $respuesta = Tematicas::editar($data);
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

        $pagination = $Listunidades->links('Administracion.PaginacionUnidades')->render();

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

    public function CargarUnidadesSelect(){
       
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
            ->select('etno_ped.tematicas.id','etno_ped.tematicas.titulo','etno_ped.unidades_tematicas.nombre AS unidad')
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
                '<button title="Evaluaciones" type="button" class="btn btn-icon btn-pure secondary  "><i class="fa fa-check-square-o"></i> </button>' .
                '<button title="Ejemplos" type="button" class="btn btn-icon btn-pure info "><i class="fa fa-etsy"></i> </button>' .
                '<button title="Practicas" type="button" class="btn btn-icon btn-pure warning  "><i class="fa fa-users"></i> </button>' .
                '</div>' .
                '</td>' .
                '<th style="vertical-align: middle" scope="row">' . $x . '</th>' .
                '<td style="vertical-align: middle">' . $item->titulo . '</td>' .
                '<td style="vertical-align: middle">'.$item->unidad.'</td>' .
                    '</tr>';

                $x++;
            }
        }

        $pagination = $ListTemas->links('Administracion.PaginacionTemas')->render();

        return response()->json([
            'temas' => $tdTable,
            'links' => $pagination,
        ]);
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
